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
	function laporan(){
		$this->template->set_title('Step');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		
		$hasil=$this->dempster();
		$this->template->load_view('site',array(
			'data'=>$this->show_hasil($hasil),
			));
		
	}
	function show_matriks_g(){
		$this->template->set_title('Step');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		
		$data=$this->matriks_gejala();
		$this->template->load_view('site',array(
			'data'=>$this->show_matriks($data),
			));
		
	}

	function show_matriks_p(){
		$this->template->set_title('Step');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		
		$data=$this->matriks_penyakit();
		$this->template->load_view('site',array(
			'data'=>$this->show_matriks2($data),
			));
		
	}
	function show_all_matrix(){
		$this->template->set_title('Step');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		
		$data1=$this->matriks_penyakit();
		$data2=$this->matriks_gejala();
		$this->template->load_view('matriks',array(
			'matriks1'=>$this->show_matriks2($data1),
			'matriks2'=>$this->show_matriks($data2),
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
	//metode backward chaining untuk teori dempster shafer
	function matriks_gejala(){
		$sumber=$this->sitedb->get_penyakit();
		$sql="";
		$sql.="SELECT DISTINCT
				a.id_gejala AS id_gejala,
				a.kode AS kode,
				a.gejala as gejala,";
		$i=1;$j=0;
		$num=count($sumber);
		// echo $num;
		foreach ($sumber as $key => $value) {
			# code...
			// echo $value['id_penyakit'];
			${'id_p'.$i}=$value['id_penyakit'];
			$kode=$value['kode'];
			// echo ${'id_p'.$i}."<br>";
			if($i<$num):
				// $sql.="Sum(IF ((`b`.`id_penyakit` = ".${'id_p'.$i}."),1,0)) AS p".$i.", ";
				$sql.="Sum(IF ((`b`.`id_penyakit` = ".${'id_p'.$i}."),1,0)) AS ".$kode.", ";
			else:
				// $sql.="Sum(IF ((`b`.`id_penyakit` = ".${'id_p'.$i}."),1,0)) AS p".$i." ";
				$sql.="Sum(IF ((`b`.`id_penyakit` = ".${'id_p'.$i}."),1,0)) AS ".$kode." ";

			endif;
			$i++;
		}
		// $sql.="Sum(IF ((`b`.`id_penyakit` = 1),1,0)) AS P1,";
				/*Sum(IF ((`b`.`id_penyakit` = 2),`a`.`id_gejala`,0)) AS P2,
				Sum(IF ((`b`.`id_penyakit` = 3),`a`.`id_gejala`,0)) AS P3,
				Sum(IF ((`b`.`id_penyakit` = 4),`a`.`id_gejala`,0)) AS P4,
				Sum(IF ((`b`.`id_penyakit` = 5),`a`.`id_gejala`,0)) AS P5*/
		
		$sql.="FROM
					(
						(`gejala` `a` 
						LEFT JOIN `rule_inferensi` `b` ON ((`b`.`id_gejala` = `a`.`id_gejala`))
						)
						LEFT JOIN `penyakit` `c` ON ((`c`.`id_penyakit` = `b`.`id_penyakit`	))
					)
				GROUP BY `a`.`id_gejala`";
		// echo "<code>".$sql."</code>";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	function matriks_penyakit(){
		$sumber=$this->sitedb->getgejala();
		$sql="";
		$sql.="SELECT DISTINCT
				a.id_penyakit,
				a.kode,
				a.penyakit,";
		$i=1;$j=0;
		$num=count($sumber);
		// echo $num;
		foreach ($sumber as $key => $value) {
			# code...
			// echo $value['id_penyakit'];
			${'id_p'.$i}=$value['id_gejala'];
			$kode=$value['kode'];
			// echo ${'id_p'.$i}."<br>";
			if($i<$num):
				// $sql.="Sum(IF ((`b`.`id_penyakit` = ".${'id_p'.$i}."),1,0)) AS p".$i.", ";
				$sql.="Sum(IF ((`b`.`id_gejala` = ".${'id_p'.$i}."),1,0)) AS ".$kode.", ";
			else:
				// $sql.="Sum(IF ((`b`.`id_penyakit` = ".${'id_p'.$i}."),1,0)) AS p".$i." ";
				$sql.="Sum(IF ((`b`.`id_gejala` = ".${'id_p'.$i}."),1,0)) AS ".$kode." ";

			endif;
			$i++;
		}
		// $sql.="Sum(IF ((`b`.`id_penyakit` = 1),1,0)) AS P1,";
				/*Sum(IF ((`b`.`id_penyakit` = 2),`a`.`id_gejala`,0)) AS P2,
				Sum(IF ((`b`.`id_penyakit` = 3),`a`.`id_gejala`,0)) AS P3,
				Sum(IF ((`b`.`id_penyakit` = 4),`a`.`id_gejala`,0)) AS P4,
				Sum(IF ((`b`.`id_penyakit` = 5),`a`.`id_gejala`,0)) AS P5*/
		
		$sql.="FROM
					(
						(`penyakit` `a` 
						LEFT JOIN `rule_inferensi` `b` ON ((`a`.`id_penyakit` = `b`.`id_penyakit`	))
						)
						LEFT JOIN `gejala` `c` ON ((`b`.`id_gejala` = `c`.`id_gejala`))
					)
				GROUP BY `a`.`id_penyakit`";
		// echo "<code>".$sql."</code>";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	
	function show_matriks($data){
		$sumber=$this->sitedb->get_penyakit();
		$num=count($sumber);
		
		$div="";
		$div.="<table class='table table-hover table-striped table-condensed'>";
		$div.="<thead><tr>";
		$div.="<th>ID Gejala</th>";
		$div.="<th>Gejala</th>";
		$div.="<th>Kode Gejala</th>";
		foreach ($sumber as $key => $value) {
			$kode=$value['kode'];
			$div.="<th>".$kode."</th>";
		}
		$div.="</tr></thead>";
		foreach ($data as $v) {
			# code...
			$div.="<tr>";
			$div.="<td>".$v['id_gejala']."</td>";
			$div.="<td>".$v['gejala']."</td>";
			$div.="<td>".$v['kode']."</td>";
			foreach ($sumber as $key => $value) {
				$kode=$value['kode'];
				if(($v[$kode])==1):
					$status="<a href=''><span style='font-size:18px;color:rgb(92, 184, 92)' class=' glyphicon glyphicon-ok '></span></a>";
				else:
					$status="<span style='font-size:18px;color:#ccc' class='glyphicon glyphicon-remove '></span>";

				endif;

				// echo $kode;
				$div.="<th style='' class=''>".$status."</th>";
			}
			
			
			$div.="</tr>";
		}
		$div.="</table>";
		return $div;
	

	}

	function show_matriks2($data){
		$sumber=$this->sitedb->getgejala();
		$num=count($sumber);
		
		$div="";
		$div.="<table class='table table-hover table-striped table-condensed'>";
		$div.="<thead><tr>";
		$div.="<th>ID Gejala</th>";
		$div.="<th>Gejala</th>";
		$div.="<th>Kode Gejala</th>";
		foreach ($sumber as $key => $value) {
			$kode=$value['kode'];
			$div.="<th>".$kode."</th>";
		}
		$div.="</tr></thead>";
		foreach ($data as $v) {
			# code...
			$div.="<tr>";
			$div.="<td>".$v['id_penyakit']."</td>";
			$div.="<td>".$v['penyakit']."</td>";
			$div.="<td>".$v['kode']."</td>";
			foreach ($sumber as $key => $value) {
				$kode=$value['kode'];
				if(($v[$kode])==1):
					$status="<a href=''><span style='font-size:18px;color:rgb(92, 184, 92)' class=' glyphicon glyphicon-ok '></span></a>";
				else:
					$status="<span style='font-size:18px;color:#ccc' class='glyphicon glyphicon-remove '></span>";

				endif;

				// echo $kode;
				$div.="<th style='' class=''>".$status."</th>";
			}
			
			
			$div.="</tr>";
		}
		$div.="</table>";
		return $div;
	

	}

	function back_chaining(){

	}
	function dempster(){
		$hasil=$this->sitedb->get_m();

		foreach ($hasil as $k => $v) {
			# code...
			$num=$v['jml'];
			$id_p=$v['id_p'];


			
			$row=$this->sitedb->get_gejala($id_p);
			foreach ($row as $key => $value) {
				# code...
				for ($i=1; $i <=$num ; $i++) { 
					# code...
					if(($value['noindex'])==$i){
						${'m'.$i}=$value['d'];
						${'mt'.$i}=$value['t'];
					}

				}
				
			}
			// echo $num."<br>";
			/*$b1=$this->proses_inti($m1,$m2);
			$b2=$this->proses_inti($b1,$m3);
			$b3=$this->proses_inti($b2,$m4);*/
			for ($j=2; $j <=$num ; $j++) { 
				# code...
				$m=$this->proses_inti($m1,${'m'.$j});
				$m1=$m;
				// echo round($m1,4)."<br>";
			}
		/*	echo $b1."<br>";
			echo $b2."<br>";
			echo $b3."<br>";
			echo $m2."<br>";
			echo $m3."<br>";
			echo $m4."<br>";
			echo $m5."<br>";
			echo $m6."<br>";
			echo $m7."<br>";*/
			$dempster=$m1*100;
			$data[]=array(
				'id_p'=>$v['id_p'],
				'kode'=>$v['kode'],
				'penyakit'=>$v['penyakit'],
				'keterangan'=>$v['keterangan'],
				'kepastian'=>round($dempster,2)."%",
			);
			/*echo $v['kode']." <br>";
			echo round($dempster,2)."% <br>";
			echo "<hr>";*/
			

		}

		return $data;
	}
	
	function show_hasil($data){
	
		$div="";
		$div.="<table class='table table-hover table-striped table-condensed'>";
		$div.="<thead><tr>";
		$div.="<th>ID Penyakit</th>";
		$div.="<th>Kode Penyakit</th>";
		$div.="<th>Penyakit</th>";
		$div.="<th>Kepastian</th>";
		$div.="<th>Keterangan</th>";
		$div.="<th>Gejala</th>";
		$div.="</tr></thead>";
		foreach ($data as $v) {
			# code...
			$div.="<tr>";
			$div.="<td>".$v['id_p']."</td>";
			$div.="<td>".$v['kode']."</td>";
			$div.="<td>".$v['penyakit']."</td>";
			$div.="<td>".$v['kepastian']."</td>";
			$div.="<td>".$v['keterangan']."</td>";
			$div.="<td>";
			$gejala=$this->sitedb->getall_gejala($v['id_p']);
			foreach ($gejala as $val) {
				# code...
				$div.="(".$val['kode_g'].") ";
				$div.=$val['gejala']."<br>";
			}
			$div.="</td>";
			
			$div.="</tr>";
		}
		$div.="</table>";
		return $div;
	

	}
	
	
}

/* End of file site.php */
/* Location: ./ */
 ?>