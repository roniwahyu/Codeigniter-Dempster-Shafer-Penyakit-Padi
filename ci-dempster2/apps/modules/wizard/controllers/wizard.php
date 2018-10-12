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
	

	function densitas($id){
		$hasil=$this->wizardb->get_densitas($id);
		return $hasil['densitas'];

	}
	function densitas_rule($idp,$idg){
		$hasil=$this->wizardb->get_density_rule($idp,$idg);
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
	function proses_inti($m1,$m2){
		// variabel $m1 adalah variabel awal, bisa jadi variabel gabungan beberapa penyakit 
		// variabel $m2 adalah variabel gejala penyakit berikutnya
		//definisi mteta
		$mt1=1-($m1); //definisi mteta pertama
		$mt2=1-($m2); //definisi mteta kedua
		//definisi pembagi rumus demspter
		$mdiv=1-($m1*$m2);
		//definisi perhitungan dalam matrix
		$m3g2=($mt1*$m2)/$mdiv;
		$m3g1=($m1*$mt2)/$mdiv;
		$mt3=($mt1*$mt2)/$mdiv;

		//hasil akkhir dari perhitungan dalam matriks
		$mbelieve=$m3g2+$m3g1;

		//hasil atau nilai believe
		return $mbelieve;
	}

	//Proses Inferensi
	//Berhubungan dengan fungsi inti ==> Function Mesin Inferensi
	function proses_inferensi(){
		$this->template->set_title('Wizard');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'wizard/";','embed');  
		$input=$this->input->post('id_gejala');
		//Jika tidak ada masukan sama sekali
		if($input==null):
		
			$this->e404('Jika tidak ada masukan,maka tidak ada keluaran..');
			$believe=0;
			return $believe;
		else:
		$this->template->load_view('data',array(
			'data'=>$this->mesin_inferensi($input),
			'result'=>$this->prepare_to_save(),
			));
		endif;
	}
	
	function prepare_to_save(){
		$input=$this->input->post('id_gejala');
		$data['nama_user']=$this->input->post('nama');
		$data['email']=$this->input->post('email');
		$data['hp']=$this->input->post('hp');
		$res=$this->mesin_inferensi($input);
		foreach ($res as $key => $value) {
			$id=$value['id_penyakit'];
			$max[$id]=$value['hasil'];
		}
		
		$max_value=max($max);
		$max_index=array_search($max_value,$max);
		
		$data['hasil_id']=$max_index;
		$data['hasil_believe']=$max_value;
		$data['gejala_masukan']=json_encode($this->input->post('id_gejala'));
		$data['datetime']=date('Y-m-d H:m:s');
		// echo var_dump($data);
		
		/*$this->template->load_view('data-hasil',array(
			'data'=>$this->save_to_db($data),
			));*/
		return $this->save_to_db($data);
		
	}
	function save_to_db($data){
		$this->wizardb->save_batch($data);
		// return $this->confirm('alert-success','Diagnosa telah selesai','');
	}

	//Mesin Inferensi Inti
	function mesin_inferensi($input=null){
		// 	$data=array();
		if($input!=null):
			$wizard=$input;

			//dapatkan data penyakti dari database 
			$penyakit=$this->wizardb->get_penyakit();
			$i=0;
			foreach ($penyakit as $key => $value) {
				
				// Dapatkan rule inferensi dari db
				$rule=$this->wizardb->get_rule($value['id_penyakit']);
				foreach ($rule as $k => $v) {

					//Masukkan hasil cek rule ke sebuah array
					$array2[]=$v['id_gejala'];
				}

				//Kondisi asli rule inferensi dalam db
				$asli=$array2;

				/*Mencari Perbedaan Pada Array*/
				$beda=(array_diff($array2,$wizard ));

				// Mencari kesamaan masukan dengan Array/Rule Inferensi dalam DB
				$union=(array_intersect($wizard, $array2));

				//Mencari perbedaan masukan dengan Array/Rule Inferensi
				$selisih=array_diff($wizard,$union);

				/*Tampilkan pesan Mesin Inferensi
				
				Tampilkan pesan ini jika ada kesamaan

				*/

				if(($asli==$union) && ($beda==null) && ($selisih==null)){
					$data[$i]['status']="<div class='panel panel-success panel-body'><h3>Diagnosa: Identik 100% Sama</h3></div>";
					$data[$i]['proses']=false;
					}elseif(($asli==$beda) && ($union==null) && ($selisih!=null)){
						$data[$i]['status']="Diagnosa: 100% Berbeda";
						$data[$i]['proses']=true;
					}elseif(($asli<>$union) && ($selisih==null)){
						$data[$i]['status']="Diagnosa: Ada kaitan gejala ";
						$data[$i]['proses']=true;
					}elseif(($asli<>$union)){
						$data[$i]['status']="Diagnosa: Ada kaitan gejala";
						$data[$i]['proses']=true;
				}else{
					// Tampilkan pesan ini jika tidak sama 100%
					$data[$i]['status']="Diagnosa: Ada kaitan gejala";
					$data[$i]['proses']=true;
				}		
						//Detail informasi tentang gejalanya
						$data[$i]['id_penyakit']=$value['id_penyakit'];

						//Detail informasi tentang gejalanya
						$data[$i]['detail']=$value;

						//Aturan atau Rule Inferensinya
						$data[$i]['rule']=$asli;

						//Perbedaan Masukan user pada Wizard dengan Rule Inferensi
						$data[$i]['diff']=$beda;

						//Gabungan/Intersect --> Masukan user yang sama dengan Rule Inferensi
						$data[$i]['union']=$union;

						//Perbedaan Antara Masukan User dengan Rule Inferensi
						$data[$i]['outfit']=$selisih;

						//Hasil Proses Dempster Shafer (Believe)  
						$data[$i]['dempster']=$this->dempster();

						//Hasil proses semua penyakit yang berkaitan dengan gejala
						$data[$i]['hasil']=$this->proses_dempster($union);

				$array2=$datax=array();
				$i++;
			}
			return $data;
		
		endif;

	}

	//function check apakah gejala masukan user sama dengan rule inferensi di db
	function proses_dempster($data){
		/*DEFINISI DATA*/
				$i=1;
				$datax=array();
				foreach ($data as $q => $nil) {
					# code...
					// echo $nil;
					$datax[]=array(
						'kd_proses'=>$i,
						'id_gejala'=>$nil,
						'densitas'=>$this->densitas($nil), //dapatkan nilai densitas dari function densitas()
						);
					$i++;
				}
				// echo var_dump($datax);
				$mdata=$datax;
				// print_r($mdata);
				/*END*/
				/*HITUNG BELIEVE*/
				if($mdata!=null):
					// echo var_dump($mdata);
					$jml=count($mdata);
					$i=1;
					foreach ($mdata as $k => $val) {
						# code...
						//definisi variabel untuk proses selanjutnya
						${'m'.$i}=$val['densitas'];
						//definisi variable 1-$x untuk proses mteta 
						${'mt'.$i}=(1-($val['densitas']));
						$i++;
					}
				
					for ($j=2; $j <=$jml ; $j++) { 
						//proses inti dari dempster shafer..ada pada function proses_inti
						$m=$this->proses_inti($m1,${'m'.$j});
						$m1=$m;
				
					}

					//hasil believe setiap pemeriksaan/diagnosa
					$believe=$m1*100;
				
					// echo "<h1>Believe:".round($believe,2)."%</h1>";

					return $believe;
				/*else:
					$this->e404('Belum ada gejala yang dipilih');
					$datax=0;
					return $datax;*/
				endif;
				/*END*/
	}

	//Function dibawah ini hanya untuk ujicoba/debug fungsi wizard/rule-inferensi
	function check_array(){
		$wizard=$this->input->post('id_gejala');
		
		if($wizard!=null):

			
			// echo var_dump($wizard);
			echo "<hr>";	
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

				/*DEFINISI DATA*/
				$i=1;
				foreach ($union as $q => $nil) {
					# code...
					// echo $nil;
					$datax[]=array(
						'kd_proses'=>$i,
						'id_gejala'=>$nil,
						'densitas'=>$this->densitas($nil),
						);
					$i++;
				}
				echo var_dump($datax);
				$mdata=$datax;
				
				/*END*/
				/*HITUNG BELIEVE*/
				if($mdata!=null):
					// echo var_dump($mdata);
					$jml=count($mdata);
					$i=1;
					foreach ($mdata as $k => $val) {
						# code...
						
						${'m'.$i}=$val['densitas'];
						${'mt'.$i}=(1-($val['densitas']));
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
				
					echo "<h1>Believe:".round($believe,2)."%</h1>";
				endif;
				/*END*/

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

				

				$mdatax=$datax=$array2=array();
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

	function confirm($type,$text,$url=null){
		$div="";
		$div.='
		<div class="alert '.$type.'">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<div class="well">'.$text.'</div>';
		if($url!=null || isset($url)):
			$div='<a href="'.$url.'" class="btn btn-info btn-md">Selanjutnya</a>';
		endif;
		$div.='</div>';

		return $div; 
	}
	
}

/* End of file wizard.php */
/* Location: ./ */
 ?>