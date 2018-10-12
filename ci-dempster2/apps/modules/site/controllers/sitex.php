<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Site extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('Ion_auth/Ion_auth'));
		$this->load->model('site_model','sitedb',TRUE);
	}
	public function index()
	{
		$this->template->load_view('site');
	}
	function step(){
		$this->template->set_title('Kelola Penyakit');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		$hasil=$this->sitedb->get_index(2);
		$this->template->load_view('site',array(
			'data'=>$this->show_data($hasil),
			));
		
	}
	function build_index(){
		$hasil=$this->sitedb->get_index();
		foreach ($hasil as $value) {
			# code...
			$data[]=array(
				'id_p'=>$value['id_penyakit'],
				'id_g'=>$value['id_gejala'],
				'd'=>$value['densitas'],
				't'=>$value['teta'],
				'noindex'=>$value['noindex'],
				);
			
		}
		$this->db->truncate('gejala_index');
		$id=$this->db->insert_batch('gejala_index',$data);
		$alert='
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Proses Tahap 1: Menyimpan data pada table Temp berhasil ...
			</div>';
	
		if(isset($id)||$id!=null){
			$this->template->load_view('site',array(
				'data'=>$alert,
				));
		}
	}

	function show_data($data){
		$div="";
		$div.="<table class='table table-hover table-striped table-condensed'>";
		$div.="<thead><tr>";
		$div.="<th>Kode Penyakit</th>";
		$div.="<th>Kode Gejala</th>";
		$div.="<th>Densitas</th>";
		$div.="<th>Teta</th>";
		$div.="</tr></thead>";
		foreach ($data as $value) {
			# code...
			$div.="<tr>";
			$div.="<td>".$value['kode_p']."</td>";
			$div.="<td>".$value['kode_g']."</td>";
			$div.="<td>".$value['densitas']."</td>";
			$div.="<td>".$value['teta']."</td>";
			$div.="</tr>";
		}
		$div.="</table>";
		return $div;
	}
	function show_proses(){
		$hasil1=$this->sitedb->get_index(2);
		echo var_dump($this->proses_array($hasil1));
		// $this->proses_kombinasi($step1);
	}
	function proses_array($d){
		
		$i=0;
		$data=array();
		foreach ($d as $value) {
			# code...
			$data=array();
			// $x=array();
			if($value['noindex']==1){
				//m1(G1)
				$m1=$value['densitas'];
				//m1(teta)
				$mt1=$value['teta'];
			}
			if($value['noindex']==2){
				//m2(G2)
				$m2=$value['densitas'];
				//m2(teta)
				$mt2=$value['teta'];
			}
			$x['m1']=$m1;
			$x['mt1']=$m1;
			$x['m2']=$m2;
			$x['mt2']=$mt2;
			
			$i++;
		}
			//teta
			$mteta=(1-$m1*$m2);
		
			//m3(G2)
			$m3g2=($mt1*$m2)/$mteta;
			
			//m3(G1)
			$m3g1=($m1*$mt2)/$mteta;
		
			//m3(teta)
			$m3teta=($mt1*$mt2)/$mteta;
			//Sehingga Believe
			//Believe{(G2),(G1)}
			$mblv=$m3g2+$m3g1;
			//hasil $m3 akan dimanfaatkan untuk perhitungan m1(G2,G1) selanjutnya
			$m3=$mblv;
			
		return $x;
			
	}
	function proses_kombinasi($data){
		//echo var_dump($data);
	}
}

/* End of file site.php */
/* Location: ./ */
 ?>