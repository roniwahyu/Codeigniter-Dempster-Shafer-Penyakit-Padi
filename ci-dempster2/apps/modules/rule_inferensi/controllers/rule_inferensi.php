<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class rule_inferensi extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('rule_inferensi_model','rule_inferensidb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','rule_inferensi');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Rule_inferensi');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'rule_inferensi/";','embed');  
        $this->template->add_js('modules/rule_inferensi.js');
        $this->template->add_js('modules/crud.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                'penyakit'=>$this->rule_inferensidb->get_drop_array('penyakit','id_penyakit','penyakit'),
                'gejala'=>$this->rule_inferensidb->get_drop_array('gejala','id_gejala','gejala'),
                        'title'=>'Kelola Data Rule_inferensi',
                        'subtitle'=>'Pengelolaan Rule_inferensi',
                        'breadcrumb'=>array(
                            'Rule_inferensi'),
                        ));
        
    }
     
    public function ckeditor(){
        session_start();
            $_SESSION['KCFINDER']=array();
            $_SESSION['kcfinder'] = FALSE;
            $_SESSION['KCFINDER']['disabled'] = false;
            $_SESSION['KCFINDER']['uploadURL'] = "../uploads";
            // $this->template->load_view('ckeditor/admin');

    }
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('id_peny_gejala,kode_p,penyakit,kode_g,gejala,datetime,id_penyakit,kode_p,id_gejala,')
                        ->from('04-view-inferensi');
        echo $this->datatables->generate();
    }
    public function getdatatablesx(){
        $this->datatables->select('id_peny_gejala,id_penyakit,id_gejala,datetime,')
                        ->from('rule_inferensi');
        echo $this->datatables->generate();
    }

   

    public function get($id_peny_gejala=null){
        if($id_peny_gejala!==null){
            echo json_encode($this->rule_inferensidb->get_one($id_peny_gejala));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_peny_gejala')){
            $this->rule_inferensidb->update($this->input->post('id_peny_gejala'));
          }else{
            $this->rule_inferensidb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_peny_gejala')){
                $this->rule_inferensidb->update($this->input->post('id_peny_gejala'));
              }else{
                $this->rule_inferensidb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->rule_inferensidb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
