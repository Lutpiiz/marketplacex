<?php
class Madministrasi extends CI_Model {
    function tampil() {
        $q = $this->db->get("customer");
        $d = $q->result_array();
        return $d;
    }

    function detail($id_customer){
    	$this->db->where('id_customer', $id_customer);
    	$q = $this->db->get('customer');
    	$d = $q->row_array();

    	return $d;
    }

    function simpan($inputan) {
        $this->db->insert('customer', $inputan);
    }

    function delete($id_customer) {
        $this->db->where('id_customer', $id_customer);
        return $this->db->delete('customer');
    }
}