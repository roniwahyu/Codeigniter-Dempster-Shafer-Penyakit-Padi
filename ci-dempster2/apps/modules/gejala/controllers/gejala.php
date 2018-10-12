<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class gejala extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('gejala_model','gejaladb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','gejala');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Gejala');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'gejala/";','embed');  
        $this->template->add_js('modules/gejala.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Gejala',
                        'subtitle'=>'Pengelolaan Gejala',
                        'breadcrumb'=>array(
                            'Gejala'),
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
        $this->datatables->select('id_gejala,kode,gejala,keterangan,densitas,datetime,')
                        ->from('gejala');
        echo $this->datatables->generate();
    }

   

    public function get($id_gejala=null){
        if($id_gejala!==null){
            echo json_encode($this->gejaladb->get_one($id_gejala));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_gejala')){
            $this->gejaladb->update($this->input->post('id_gejala'));
          }else{
            $this->gejaladb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_gejala')){
                $this->gejaladb->update($this->input->post('id_gejala'));
              }else{
                $this->gejaladb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->gejaladb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

