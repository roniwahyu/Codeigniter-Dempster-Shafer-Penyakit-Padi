<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Question extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('Datatables','ion_auth/ion_auth'));
        // $this->load->model('question_model','questiondb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','question');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
	}
	function index(){

		redirect('site','refresh');
	}
	
	public function proses($id=null){
		if($id==null):
			$id=0;
			redirect('alternatif','refresh');
		endif;

		
		$this->template->set_title('Kelola Radio');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'question/";','embed');  
        $this->template->add_js('var redirect="'.base_url().'alternatif/";','embed');  
        $this->template->add_js('wizard.js');
        $this->template->add_css('wizard.css');
         $this->template->add_js('radio.js');
         $this->template->add_js('proses_question.js');
        $this->template->add_css('radio.css');
		$this->template->load_view('wizard',array(
			'id'=>$id,
			));
	}
	function submit(){
		$this->load->model('nilai_resiko/nilai_resiko_model','nilaidb',TRUE);

		$id_alternatif=(!empty($this->input->post('id_alternatif', TRUE))?$this->input->post('id_alternatif', TRUE):0);
		$buta=(!empty($this->input->post('buta', TRUE))?$this->input->post('buta', TRUE):0);
		$mata_iritasi=(!empty($this->input->post('mata_iritasi', TRUE))?$this->input->post('mata_iritasi', TRUE):0);
		$patah=(!empty($this->input->post('patah', TRUE))?$this->input->post('patah', TRUE):0);
		$memar=(!empty($this->input->post('memar', TRUE))?$this->input->post('memar', TRUE):0);
		$bakar_mati=(!empty($this->input->post('bakar_mati', TRUE))?$this->input->post('bakar_mati', TRUE):0);
		$bakar_cacat=(!empty($this->input->post('bakar_cacat', TRUE))?$this->input->post('bakar_cacat', TRUE):0);
		$bakar_luka=(!empty($this->input->post('bakar_luka', TRUE))?$this->input->post('bakar_luka', TRUE):0);
		$hirup_debu=(!empty($this->input->post('hirup_debu', TRUE))?$this->input->post('hirup_debu', TRUE):0);
		$hirup_kapur=(!empty($this->input->post('hirup_kapur', TRUE))?$this->input->post('hirup_kapur', TRUE):0);
		$percik_bakar=(!empty($this->input->post('percik_bakar', TRUE))?$this->input->post('percik_bakar', TRUE):0);
		$percik_racun=(!empty($this->input->post('percik_racun', TRUE))?$this->input->post('percik_racun', TRUE):0);
		$percik_iritasi=(!empty($this->input->post('percik_iritasi', TRUE))?$this->input->post('percik_iritasi', TRUE):0);
		$tuli=(!empty($this->input->post('tuli', TRUE))?$this->input->post('tuli', TRUE):0);
		$gangguan_telinga=(!empty($this->input->post('gangguan_telinga', TRUE))?$this->input->post('gangguan_telinga', TRUE):0);

		
		$resiko=array(
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'1',
				'nilai_resiko'=>$patah
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'2',
				'nilai_resiko'=>$memar
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'3',
				'nilai_resiko'=>$buta
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'4',
				'nilai_resiko'=>$mata_iritasi
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'5',
				'nilai_resiko'=>$bakar_mati
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'6',
				'nilai_resiko'=>$bakar_cacat
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'7',
				'nilai_resiko'=>$bakar_luka
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'8',
				'nilai_resiko'=>$hirup_kapur
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'9',
				'nilai_resiko'=>$hirup_debu
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'10',
				'nilai_resiko'=>$percik_racun
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'11',
				'nilai_resiko'=>$percik_bakar
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'12',
				'nilai_resiko'=>$percik_iritasi
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'13',
				'nilai_resiko'=>$tuli
				),
			array(
				'id_alternatif'=>$id_alternatif,'id_resiko'=>'14',
				'nilai_resiko'=>$gangguan_telinga
				));
			// echo var_dump($resiko);
		$this->nilaidb->delete_alt($id_alternatif);
		// $this->db->insert_batch('nilai_resiko',$resiko);
		$this->nilaidb->save_batch($resiko);
		// if($this->db->insert_id()!=null):
			
		// endif;
	}
	
}

 ?>