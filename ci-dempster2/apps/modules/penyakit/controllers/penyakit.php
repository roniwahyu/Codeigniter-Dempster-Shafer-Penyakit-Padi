<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class penyakit extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('penyakit_model','penyakitdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','penyakit');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Penyakit');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'penyakit/";','embed');  
        $this->template->add_js('modules/penyakit.js');
        $this->template->add_js('modules/crud.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Penyakit',
                        'subtitle'=>'Pengelolaan Penyakit',
                        'breadcrumb'=>array(
                            'Penyakit'),
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
        $this->datatables->select('id_penyakit,kode,penyakit,keterangan,penyebab,penanggulangan,datetime,isactive')
                        ->from('penyakit');
        echo $this->datatables->generate();
    }

   

    public function get($id_penyakit=null){
        if($id_penyakit!==null){
            echo json_encode($this->penyakitdb->get_one($id_penyakit));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_penyakit')){
            $this->penyakitdb->update($this->input->post('id_penyakit'));
          }else{
            $this->penyakitdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_penyakit')){
                $this->penyakitdb->update($this->input->post('id_penyakit'));
              }else{
                $this->penyakitdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->penyakitdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
