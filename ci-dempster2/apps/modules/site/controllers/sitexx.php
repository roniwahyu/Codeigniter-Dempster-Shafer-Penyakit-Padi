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
		$this->template->set_title('Dempster Shafer - Penyakit Padi');
		$this->template->load_view('site');
	}
	function step(){
		$this->template->set_title('Step');
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
	function proses(){
		$this->template->set_title('Proses Dempster Shafer');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		$hasil=$this->proses_array();
		$this->template->load_view('site',array(
			'data'=>$this->show_proses($hasil),
			));

	}
	function coba(){
		$hasil=$this->proses_array();
		// $hasil=$this->proses_dempster($hasil,3);
		$this->template->load_view('site',array(
			'data'=>$this->show_proses($hasil),
			));
	}
	function proses_array(){
		$m=$this->sitedb->get_m();
			
		foreach ($m as $key=> $value) {
			# code...
			$m1=round($value['m1'],5);
			$mt1=round($value['mt1'],5);
			$m2=round($value['m2'],5);
			$mt2=round($value['mt2'],5);
			$m3=round($value['m3'],5);
			$mt3=round($value['mt3'],5);
			
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

			$data[]=array(
				'idindex'=>$value['id_g_index'],
				'id_p'=>$value['id_p'],
				'mteta'=>round($mteta,4),
				'm3g2'=>round($m3g2,4),
				'm3g1'=>round($m3g1,4),
				'm3teta'=>round($m3teta,4),
				'mbelieve'=>round($mblv,4),
				);
			
		}
		return $data;
	}
	function proses_dempster($data,$num=null){
		$m=$this->sitedb->get_m();
		$m2=$m[0]['m'."3"];
		$mt2=$m[0]['mt'."3"];

		foreach ($data as $key => $value) {
			# code...
			// echo $value['mbelieve'];
			$m1=round($value['mbelieve'],5);
			$mt1=round((1-$value['mbelieve']),5);
			$m2=$m[$key]['m'.$num];
			$mt2=$m[$key]['mt'.$num];
		
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


			$data[]=array(
				'idindex'=>$value['idindex'],
				'id_p'=>$value['id_p'],
				'mteta'=>round($mteta,4),
				'm3g2'=>round($m3g2,4),
				'm3g1'=>round($m3g1,4),
				'm3teta'=>round($m3teta,4),
				'mbelieve'=>round($mblv,4),
				);
		}
		echo var_dump($data);
	}
	function show_proses($data){
		$div="";
		$div.="<table class='table table-hover table-striped table-condensed'>";
		$div.="<thead><tr>";
		$div.="<th>Kode Index</th>";
		$div.="<th>Kode Penyakit</th>";
	
		$div.="<th>Teta</th>";
		$div.="<th>M3G2</th>";
		$div.="<th>M3G1</th>";
		$div.="<th>MTeta</th>";
		$div.="<th>M3</th>";
		$div.="</tr></thead>";
		foreach ($data as $value) {
			# code...
			$div.="<tr>";
			$div.="<td>".$value['idindex']."</td>";
			$div.="<td>".$value['id_p']."</td>";
			$div.="<td>".$value['mteta']."</td>";
			$div.="<td>".$value['m3g2']."</td>";
			$div.="<td>".$value['m3g1']."</td>";
			$div.="<td>".$value['m3teta']."</td>";
			$div.="<td>".$value['mbelieve']."</td>";
			$div.="</tr>";
		}
		$div.="</table>";
		return $div;
	}
	
}

/* End of file site.php */
/* Location: ./ */
 ?>