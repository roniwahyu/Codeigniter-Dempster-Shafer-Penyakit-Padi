<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Gejala_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('gejala', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_gejala) {
        $this->db->where('id_gejala', $id_gejala);
        $result = $this->db->get('gejala');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
           
            'gejala' => $this->input->post('gejala', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'densitas' => $this->input->post('densitas', TRUE),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('gejala', $data);
    }

    function update($id_gejala) {
        $data = array(
        'id_gejala' => $this->input->post('id_gejala',TRUE),
       'kode' => $this->input->post('kode', TRUE),
       
       'gejala' => $this->input->post('gejala', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'densitas' => $this->input->post('densitas', TRUE),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id_gejala', $id_gejala);
        $this->db->update('gejala', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_gejala) {
        $this->db->where('id_gejala', $id_gejala);
        $this->db->delete('gejala'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_gejala, '.$value.' from gejala order by id_gejala asc');
        $result[0]="-- Pilih Urutan id_gejala --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_gejala]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
