<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_customer')) {
            redirect('/', 'refresh');
        }
        $this->load->model("Mproduct");
    }

    public function index()
    {
        $data['produk'] = $this->Mproduct->tampil();

        $this->load->view('header');
        $this->load->view('product', $data);
        $this->load->view('footer');
    }

    public function detail($id_produk)
    {
        $this->load->model("Mrating");
        $id_customer = $this->session->userdata('id_customer');
        $data['detail_produk'] = $this->Mproduct->detail_produk($id_produk);

        $punya_transaksi = $this->Mproduct->user_transaksi($id_customer);
        $alpha = $punya_transaksi ? 0.7 : 1.0; // 100% CBF jika belum pernah transaksi
        $semua_produk = $this->Mproduct->tampil();

        // Ambil semua rating & similarity antar user
        $ratings = $this->Mrating->get_all_ratings();
        $similarities = $this->Mrating->get_user_similarity_matrix($ratings);

        // ---------- 1. Hitung skor Collaborative Filtering ----------
        $cf_scores = [];
        foreach ($semua_produk as $p) {
            if ($p['id_produk'] != $id_produk) {
                $score = $this->Mrating->predict_rating($id_customer, $p['id_produk'], $ratings, $similarities);
                if ($score > 0) {
                    $p['cf_score'] = round($score, 3);
                    $cf_scores[] = $p;
                }
            }
        }

        // Urutkan CF dari skor tertinggi
        usort($cf_scores, function ($a, $b) {
            return $b['cf_score'] <=> $a['cf_score'];
        });
        $data['rekomendasi_cf'] = $cf_scores;

        // ---------- 2. Ambil rekomendasi Content-Based Filtering ----------
        $cbf_data = $this->Mproduct->produk_serupa($id_produk); // punya 'similarity'

        // ---------- 3. Gabungkan ke dalam Hybrid Score ----------
        $cbf_map = [];
        foreach ($cbf_data as $p) {
            $cbf_map[$p['id_produk']] = $p['similarity'];
        }

        $cf_map = [];
        foreach ($cf_scores as $p) {
            $cf_map[$p['id_produk']] = $p;
        }

        $hybrid = [];

        foreach ($cbf_data as $cbf_item) {
            $id = $cbf_item['id_produk'];
            $cbf_score = $cbf_map[$id];
            $cf_score = isset($cf_map[$id]) ? $cf_map[$id]['cf_score'] : 0;

            $cf_normalized = $cf_score > 0 ? ($cf_score / 5) : 0;

            $cbf_item['cf_score'] = $cf_score;
            $cbf_item['cf_normalized'] = $cf_normalized;
            $cbf_item['hybrid_score'] = round(($alpha * $cbf_score) + ((1 - $alpha) * $cf_normalized), 4);

            $hybrid[] = $cbf_item;
        }

        // Urutkan berdasarkan skor hybrid tertinggi
        usort($hybrid, function ($a, $b) {
            return $b['hybrid_score'] <=> $a['hybrid_score'];
        });

        $data['rekomendasi_hybrid'] = array_slice($hybrid, 0); // tampilkan semua/teratas

        // ---------- 4. Tampilkan ke view ----------
        $this->load->view('header');
        $this->load->view('product_detail', $data);
        $this->load->view('footer');
    }



    public function similarity_matrix()
    {
        $this->load->model('Mrating');
        $ratings = $this->Mrating->get_all_ratings();
        $matrix = $this->Mrating->get_user_similarity_matrix($ratings);

        echo "<pre>";
        print_r($matrix); // Tampilkan hasil array nested
        echo "</pre>";
    }


    public function pesan()
    {
        $id_customer = $this->session->userdata('id_customer');
        $id_produk = $this->input->post('id_produk');
        $produk = $this->Mproduct->detail_produk($id_produk);
        $total_transaksi = $produk['harga'];
        $kode_transaksi = date('YmdHis') . rand(100, 999);

        $data = [
            'kode_transaksi' => $kode_transaksi,
            'id_customer' => $id_customer,
            'id_produk' => $id_produk,
            'tanggal_pesan' => date('Y-m-d H:i:s'),
            'status_transaksi' => 'selesai',
            'total_transaksi' => $total_transaksi,
        ];

        $this->db->insert('transaksi', $data);

        $this->session->set_flashdata('pesan_sukses', 'Pesanan diterima!');

        redirect('order', 'refresh');
    }
}
