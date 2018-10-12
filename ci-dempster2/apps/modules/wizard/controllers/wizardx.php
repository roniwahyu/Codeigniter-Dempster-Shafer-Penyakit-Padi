<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Wizard extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Ion_auth/Ion_auth');
		$this->load->model('wizard_model','wizardb',TRUE);
	}
	public function index(){
		$this->template->set_title('Wizard');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'wizard/";','embed');  
		$this->template->load_view('wizard',array(
			'data'=>$this->wizardb->get_gejala(),
			));
	}
	function setup($id=null){
		$this->template->set_title('Wizard');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'wizard/";','embed');  
		$this->template->load_view('setup',array(
			'data'=>$this->wizardb->get_gejala(),
			'default'=>$this->wizardb->get_all_default($id),
			));
	}
	function checklist(){
		$this->template->set_title('Wizard');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'wizard/";','embed');  
        $this->template->add_js('checklist.js');  
		$this->template->load_view('checklist',array(
			'data'=>$this->wizardb->get_gejala(),
			));
	}
	function get_default_val($id1,$id2){
        $val=$this->penyakitdb->get_default_val($id2,$id2);
        return $val['density'];
    }
	function proses(){
		
		if(($this->input->post('id_gejala'))!==null){
			$data=$this->input->post('id_gejala');
			if($data!==false){
				// echo var_dump($data);
				$i=1;
				foreach ($data as $key => $value) {
					# code...
					// echo $value;
					$datax[]=array(
						'kd_proses'=>$i,
						'id_gejala'=>$value,
						'densitas'=>$this->densitas($value),
						);
					$i++;
				}
			return $datax;
			}else{
				$this->e404('Belum ada gejala yang dipilih');
				$datax=0;
				return $datax;
			}
		}else{
			$this->e404('Belum ada gejala yang dipilih');
			$datax=0;
				return $datax;
		}
		
	}

	function densitas($id){
		$hasil=$this->wizardb->get_densitas($id);
		return $hasil['densitas'];

	}
	function e404($msg=null){
		if($msg!==null){
			$pesan=$msg;
		}else{
			$pesan="Error Aja!";
		}
		$this->template->load_view('e404',array(
			'error'=>true,
			'msg'=>$pesan,
			));
	}

	function proses_inti($m1,$m2){
		$mt1=1-($m1);
		$mt2=1-($m2);
		//divider
		$mdiv=1-($m1*$m2);
		$m3g2=($mt1*$m2)/$mdiv;
		$m3g1=($m1*$mt2)/$mdiv;
		$mt3=($mt1*$mt2)/$mdiv;
		$mbelieve=$m3g2+$m3g1;

		return $mbelieve;
	}

	function proses_inferensi(){
		$this->template->set_title('Wizard');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'wizard/";','embed');  
		$input=$this->input->post('id_gejala');
		if($input==null):
		
			$this->e404('Jika tidak ada masukan,maka tidak ada keluaran..');
			$believe=0;
			return $believe;
		else:
		$this->template->load_view('data',array(
			'data'=>$this->mesin_inferensi($input),
			));
		endif;
	}
	function mesin_inferensi($input=null){
		// 	$data=array();
		if($input!=null):
			$wizard=$input;
			$penyakit=$this->wizardb->get_penyakit();
			$i=0;
			foreach ($penyakit as $key => $value) {
				
				$rule=$this->wizardb->get_rule($value['id_penyakit']);
				foreach ($rule as $k => $v) {
					//Masukkan hasil cek rule ke sebuah array
					$array2[]=$v['id_gejala'];
				}

				$asli=$array2;

				/*Mencari Perbedaan Pada Array*/
				$beda=(array_diff($array2,$wizard ));
				$union=(array_intersect($wizard, $array2));
				$selisih=array_diff($wizard,$union);

				/*Mesin Inferensi*/
				if(($asli==$union) && ($beda==null) && ($selisih==null)){
					$data[$i]['status']="Diagnosa: Identik 100% Sama";
					$data[$i]['proses']=false;
					}elseif(($asli==$beda) && ($union==null) && ($selisih!=null)){
						$data[$i]['status']="Diagnosa: 100% Berbeda";
						$data[$i]['proses']=true;
					}elseif(($asli<>$union) && ($selisih==null)){
						$data[$i]['status']="Diagnosa: Ada kaitan ";
						$data[$i]['proses']=true;
					}elseif(($asli<>$union)){
						$data[$i]['status']="Diagnosa: Ada kaitan";
						$data[$i]['proses']=true;
				}
				
						$data[$i]['detail']=$value;
						$data[$i]['rule']=$asli;
						$data[$i]['diff']=$beda;
						$data[$i]['union']=$union;
						$data[$i]['outfit']=$selisih;
						$data[$i]['dempster']=$this->dempster();
				$array2=array();
				$i++;
			}
			return $data;
		
		endif;

	}
	function check_array(){
		$wizard=$this->input->post('id_gejala');
		if($wizard!=null):
			// echo var_dump($wizard);
		// echo "<br>";	
			$penyakit=$this->wizardb->get_penyakit();
			foreach ($penyakit as $key => $value) {
				# code...
				echo "<h1>(".$value['kode'].") ".$value['penyakit']."</h1>";
				echo "<br>";
				$rule=$this->wizardb->get_rule($value['id_penyakit']);
				foreach ($rule as $k => $v) {
					# code...
					$array2[]=$v['id_gejala'];
					

				}
				// echo $value['id_penyakit'];
				echo "<div class='well' style='background:#cec'><h3>Masukan User</h3>";
				echo var_dump($wizard);
				echo "</div><br>";
				echo "<div class='well' style='background:#cce'><h3>Rule</h3>";
				echo var_dump($array2);
				echo "</div><br>";
				$asli=$array2;
				$beda=(array_diff($array2,$wizard ));
				$union=(array_intersect($wizard, $array2));
				$selisih=array_diff($wizard,$union);
				// array
				echo "<div class='well' style='background:#ddd'>Beda >>";
				echo var_dump($beda);
				echo "</div><br>";
				echo "<div class='well' style='background:#fce'>Gabungan >>";
				echo var_dump($union);
				echo "</div>";
				echo "<div class='well' style='background:#fce'><h5>Selisih:</h5>";
				echo var_dump($selisih);
				echo "</div>";
				if(($asli==$union) && ($beda==null) && ($selisih==null)){
					echo "<h1>Masukan 100% Sama</h1>";

				}elseif(($asli==$beda) && ($union==null) && ($selisih!=null)){
					echo "<h1>Masukan 100% Berbeda</h1>";
				}elseif(($asli<>$union) && ($selisih==null)){
					echo "<h1>Masukan Anggota Himpunan Penuh </h1>";
				}elseif(($asli<>$union)){
					echo "<h1>Masukan Ada kaitan</h1>";
				}
				echo "<hr>";



				$array2=array();
			}
		else:
			$this->e404('Jika tidak ada masukan,maka tidak ada keluaran..');
				$believe=0;
				return $believe;
		endif;
		
		


	}
	function dempster(){

		$mdata=$this->proses();
		if($mdata!=null):
			// echo var_dump($mdata);
			$jml=count($mdata);
			$i=1;
			foreach ($mdata as $key => $value) {
				# code...
				
				${'m'.$i}=$value['densitas'];
				${'mt'.$i}=(1-($value['densitas']));
				$i++;
			}
			/*echo $m1."| ".$mt1."<br>";
				echo $m2."| ".$mt2."<br>";
				echo $m3."| ".$mt3."<br>";
				echo $m4."| ".$mt4."<br>";*/

			for ($j=2; $j <=$jml ; $j++) { 
				$m=$this->proses_inti($m1,${'m'.$j});
				$m1=$m;
				// echo round($m1,4)."<br>";
			}

			$believe=$m1*100;
		
			return $believe;
		else:
			$this->e404('Tidak ada masukan, tidak ada keluaran..');
				$believe=0;
				return $believe;
		endif;
	}

	function proses_wizard(){
		$this->template->set_title('Wizard');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'wizard/";','embed');  
		$this->template->load_view('result',array(
			'kepastian'=>$this->dempster(),
			'dempster'=>true,
			));
	}
	
}

/* End of file wizard.php */
/* Location: ./ */
 ?>