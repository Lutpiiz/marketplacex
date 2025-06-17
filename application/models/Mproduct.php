<?php
class Mproduct extends CI_Model {
    function tampil() {

        $q = $this->db->get("produk");

        $d = $q->result_array();

        return $d;
    }

    public function detail_produk($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('produk');

        return $query->row_array();
    }

}

