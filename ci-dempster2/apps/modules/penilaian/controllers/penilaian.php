<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Penilaian extends MX_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library(array('template','Ion_auth/Ion_auth'));
		$this->load->model('penilaian_model','nilaidb',TRUE);

	}
	public function index()
	{
		$this->template->set_title('Haloo');
		$this->template->load_view('site');

	}

	//penilaian/edit/1
	function edit($id){
		$ubah=$this->nilaidb->get_one($id);
		foreach($ubah as $key=>$value){
			echo $value;
		}

	}

	function submit(){

		$data=array(
			'idoperator'=>$this->input->post('idoperator'),
			'namamesin'=>$this->input->post('namamesin'),
			'npp'=>$this->input->post('npp'),
			'npp'=>$this->input->post('npp'),
			);
		$this->nilaidb->insert($data);
	}
}

