<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Site_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	function get_index($upto=null,$limit=null){
		$sql="SELECT 
				x.* 
				from (SELECT
				a.kode_p,
				a.kode_g,
				a.densitas,
				a.teta,
				a.id_penyakit,
				a.id_gejala,
				@num := if(@kode=a.kode_p, @num + 1, 1) as noindex,
				@kode:= a.kode_p as dummy
				FROM
				`02-view-teta-simple` AS a,
				(SELECT @num:='', @kode:=0) AS h) x";
		if($upto!=null){
			$sql.=" having noindex<=".$upto;
		}
		if($limit!=null){
			$sql.=" limit ".$upto.",".$limit;
		}
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }	
		
	}
	 function get_penyakit() {

        $result = $this->db->get('penyakit');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function getgejala() {

        $result = $this->db->get('gejala');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
    function gejala_detail($id_g) {
    	$this->db->where('id_gejala',$id_g);
        $result = $this->db->get('gejala');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
	function get_m(){
		$result = $this->db->get('03-2-define-m');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}

	function get_gejala($id_p=null){
		if(isset($id_p)){
			$this->db->where('id_p',$id_p);
		}
		$result = $this->db->get('03-1-get-all-index');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	function getall_gejala($id=null){
		if(isset($id)){
			$this->db->where('id_penyakit',$id);
		}
		$result = $this->db->get('03-0-view-all-gejala');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}

	function get_hasil(){
		$result = $this->db->get('05-view-hasil-wizard');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
}

/* End of file site_model.php */
/* Location: ./ */
 ?>