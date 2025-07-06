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


    public function detail($id_transaksi) {
        $this->db->select('
            transaksi.id_transaksi AS id_transaksi,
            transaksi.kode_transaksi,
            transaksi.id_customer AS id_customer,
            transaksi.id_produk AS id_produk,
            transaksi.tanggal_pesan,
            transaksi.status_transaksi,
            transaksi.total_transaksi,
            produk.nama_produk,
            produk.foto_produk,
            rating.nilai_rating,
            rating.isi_rating
        ');
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('rating', 'transaksi.id_transaksi = rating.id_transaksi', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);

        $q = $this->db->get();
        return $q->row_array();
    }

    function kirim_rating($input) {
        $input['id_customer'] = $this->session->userdata('id_customer');
        $input['waktu_rating'] = date("Y-m-d H:i:s");
        
        $this->db->insert('rating', $input);
    }
}