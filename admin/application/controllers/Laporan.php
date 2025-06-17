<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlaporan');
    }

    public function chart_pemasukan()
    {
        $data = $this->Mlaporan->pemasukan();

        // Format data untuk Highcharts
        $chart_data = [
            'categories' => [],
            'data' => []
        ];

        foreach ($data as $row) {
            $chart_data['categories'][] = $row['tanggal']; // Tanggal sebagai kategori
            $chart_data['data'][] = (float) $row['total_penjualan']; // Total penjualan sebagai nilai
        }

        // Kirim data dalam format JSON
        echo json_encode($chart_data);
    }

    public function chart_layanan()
    {
        $data = $this->Mlaporan->layanan_dipesan();

        // Format data untuk Highcharts
        $chart_data = [];
        foreach ($data as $row) {
            $chart_data[] = [
                'name' => $row['nama_layanan'], 
                'y' => (int) $row['jumlah_pesan']
            ];
        }

        // Kirim data dalam format JSON
        echo json_encode($chart_data);
    }

    public function chart_penjualan()
    {
        $data = $this->Mlaporan->penjualan_per_hari();

        // Format data untuk Highcharts
        $chart_data = [
            'categories' => [],
            'data' => []
        ];

        foreach ($data as $row) {
            $chart_data['categories'][] = $row['tanggal']; // Tanggal sebagai kategori
            $chart_data['data'][] = (int) $row['jumlah_terjual']; // Jumlah terjual sebagai nilai
        }

        // Kirim data dalam format JSON
        echo json_encode($chart_data);
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('laporan_tampil');
        $this->load->view('footer');
    }
}
