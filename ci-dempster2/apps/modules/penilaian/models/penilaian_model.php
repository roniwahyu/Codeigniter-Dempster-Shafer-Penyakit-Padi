<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Penilaian_model extends CI_Model {

	public function method_name()
	{
		
	}
	function read(){
		$result=$this->db->get('penilaian');
		if($result->num_row()>0){
			return $result->result_array();
		else{

			return array();
		}
	}
	///penilaian/edit/1
	function getone($id){
		$this->db->where('id_penilaian',$id);
		$result=$this->db->get('penilaian');
		if($result->num_row()=1){
			return $result->row_array();
		else{
			return array();
		}
	}
	function insert($data){
		
		$this->db->insert($data);
		// return $this->db->insert_id($insert);
	}

	function input($data){
		return $this->db->insert($data);
	}

	function update($id,$data){
		$this->db->where('id_penilaian',$id);
		$this->db->update('penilain',$data);

	}

	function delete(){

	}
}

/* End of file penilaian_model.php */
/* Location: ./ */
 ?>