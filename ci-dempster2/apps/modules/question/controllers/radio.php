<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Radio extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('Datatables','ion_auth/ion_auth'));
        // $this->load->model('radio_model','radiodb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','radio');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    
	}
	public function index()	{
		$this->template->set_title('Kelola Radio');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'radio/";','embed');  
       
		$this->template->load_view('index');
	}
	function radiobutton(){
		$this->template->set_title('Kelola Radio');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'radio/";','embed');  
        $this->template->add_js('radio.js');
        $this->template->add_css('radio.css');
		$this->template->load_view('radiobutton');

	}
	function checkbox(){
		$this->template->set_title('Kelola Radio');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'radio/";','embed');  
        $this->template->add_js('radio.js');
        $this->template->add_css('radio.css');
		$this->template->load_view('checkbox');

	}
	function image_checkbox(){
		$this->template->set_title('Kelola Radio');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'radio/";','embed');  
        $this->template->add_js('radio.js');
        $this->template->add_css('radio.css');
		$this->template->load_view('image-checkbox');

	}
	function quiz(){
		$this->template->set_title('Kelola Radio');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'radio/";','embed');  
        $this->template->add_js('quiz.js');
        $this->template->add_css('quiz.css');
		$this->template->load_view('quiz');

	}
}

/* End of file radio.php */
/* Location: ./ */
 ?>