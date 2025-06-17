<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_customer')) {
            redirect('/', 'refresh');
        }
    }

	public function index()
	{
		$this->load->model("Mproduct");
        $data['produk'] = $this->Mproduct->tampil();

		$this->load->view('header');
		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	public function detail($id_produk)
	{
		$this->load->model("Mproduct");
		$data['detail_produk'] = $this->Mproduct->detail_produk($id_produk);

		$this->load->view('header');
		$this->load->view('product_detail', $data);
		$this->load->view('footer');
	}

	public function pesan() {
        $this->load->model("Mproduct");
    
        $id_customer = $this->session->userdata('id_customer');
        $id_produk = $this->input->post('id_produk');
        $produk = $this->Mproduct->detail_produk($id_produk);
        $total_transaksi = $produk['harga'];
        $kode_transaksi = 'TRX' . date('YmdHis') . rand(100, 999);
    
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
