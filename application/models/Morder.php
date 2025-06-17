<?php
class Morder extends CI_Model {
    function tampil() {
    $this->db->select('transaksi.*, produk.nama_produk');
    $this->db->from('transaksi');
    $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
    $this->db->where('transaksi.id_customer', $this->session->userdata('id_customer'));
    $this->db->order_by('transaksi.tanggal_pesan', 'DESC');
    $query = $this->db->get();

    return $query->result_array();
    }


    function detail($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk', 'left');
        $this->db->group_by('produk.id_produk');

        $q = $this->db->get("transaksi");
        $d = $q->row_array();

        return $d;
    }

    function set_lunas($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
		$this->db->set('status_transaksi', 'dibayar');
		$this->db->update('transaksi');
    }
}