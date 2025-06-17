<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{
    public function pemasukan()
    {
        $this->db->select('DATE(tanggal_pesan) as tanggal, SUM(total_transaksi) as total_penjualan');
        $this->db->from('transaksi');
        $this->db->group_by('DATE(tanggal_pesan)');
        $this->db->order_by('tanggal', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function layanan_dipesan()
    {
        $this->db->select('layanan.nama_layanan, COUNT(transaksi.id_layanan) as jumlah_pesan');
        $this->db->from('transaksi');
        $this->db->join('layanan', 'transaksi.id_layanan = layanan.id_layanan', 'left');
        $this->db->group_by('layanan.id_layanan');
        $this->db->order_by('jumlah_pesan', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function penjualan_per_hari()
    {
        $this->db->select('DATE(tanggal_pesan) as tanggal, SUM(jumlah_pesan) as jumlah_terjual');
        $this->db->from('transaksi');
        $this->db->group_by('DATE(tanggal_pesan)');
        $this->db->order_by('tanggal', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
}
