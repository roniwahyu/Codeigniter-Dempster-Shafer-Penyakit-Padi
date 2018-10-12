<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Wizard_model extends CI_Model {

	function get_gejala(){
        $result = $this->db->get('03-3-view-gejala');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_penyakit(){
        $result = $this->db->get('penyakit');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_rule($id=null){
        if($id!==null):
            $this->db->where('id_penyakit',$id);
		    
        endif;
        $result = $this->db->get('rule_inferensi');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	function get_densitas($id){
        $this->db->select('densitas');
        $this->db->where('id_gejala',$id);
        $result = $this->db->get('03-3-view-gejala');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_density_rule($id_p,$id_g){
		$this->db->select('densitas');
        $this->db->where('id_penyakit',$id_p);
		$this->db->where('id_gejala',$id_g);
		$result = $this->db->get('04-view-inferensi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
	}
    function get_default_val($id1,$id2){
        $this->db->where('id_penyakit', $id1);
        $this->db->where('id_gejala', $id2);
        $result = $this->db->get('03-0-view-all-gejala');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_all_default($id){
        $this->db->where('id_penyakit', $id);
        $result = $this->db->get('03-0-view-all-gejala');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save_batch($data){
        // $this->db->insert_batch('wizard',$data);
        $this->db->insert('wizard',$data);
        return $this->db->insert_id();
    }
}

/* End of file wizard_model.php */
/* Location: ./ */
 ?>