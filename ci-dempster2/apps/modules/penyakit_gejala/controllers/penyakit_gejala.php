<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class penyakit_gejala extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('penyakit_gejala_model','penyakit_gejaladb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','penyakit_gejala');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Penyakit_gejala');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'penyakit_gejala/";','embed');  
        $this->template->add_js('modules/penyakit_gejala.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Penyakit_gejala',
                        'subtitle'=>'Pengelolaan Penyakit_gejala',
                        'breadcrumb'=>array(
                            'Penyakit_gejala'),
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
        $this->datatables->select('id_peny_gejala,id_penyakit,id_gejala,density,datetime,')
                        ->from('penyakit_gejala');
        echo $this->datatables->generate();
    }

   

    public function get($id_peny_gejala=null){
        if($id_peny_gejala!==null){
            echo json_encode($this->penyakit_gejaladb->get_one($id_peny_gejala));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_peny_gejala')){
            $this->penyakit_gejaladb->update($this->input->post('id_peny_gejala'));
          }else{
            $this->penyakit_gejaladb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_peny_gejala')){
                $this->penyakit_gejaladb->update($this->input->post('id_peny_gejala'));
              }else{
                $this->penyakit_gejaladb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->penyakit_gejaladb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
