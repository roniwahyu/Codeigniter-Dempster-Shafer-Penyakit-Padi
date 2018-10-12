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

	function laporan(){
		$hasil=$this->sitedb->get_hasil();
		$div="";
		$div.="<table class='table table-bordered table-hover table-striped table-condensed'>";
		$div.="<thead><tr>";
		$div.="<th>Nama User</th>";
		$div.="<th>Gejala</th>";
		$div.="<th>Penyakit</th>";
		$div.="<th>Penyebab</th>";
		$div.="<th>Penanggulangan</th>";
		$div.="</tr></thead>";
		$div.="</tbody>";

		foreach ($hasil as $key => $value) {
			# code...
			// echo var_dump($value);
			$div.="<tr>";
			$div.="<td>".$value['nama_user']."</td>";
			$gejala=json_decode($value['gejala_masukan']);
			$div.="<td><p>";
			foreach ($gejala as $k => $v) {
				# code...
				$detail=$this->sitedb->gejala_detail($v);

				$div.="<strong>[".$detail['kode']."]</strong> ".$detail['gejala']." (".round($detail['densitas'],2).")<br>";
			}
			$div.="</p></td>";
			// $div.="<td>".var_dump(json_decode($value['gejala_masukan']))."</td>";
			
			$div.="<td>".$value['penyakit']." (".$value['hasil_believe']."%)</td>";
			$div.="<td>".$value['penyebab']."</td>";
			$div.="<td>".$value['penanggulangan']."</td>";
			$div.="</tr>";
		}
		$div.="</tbody>";
		$this->template->load_view('site',array(
			'data'=>$div,
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

	
}