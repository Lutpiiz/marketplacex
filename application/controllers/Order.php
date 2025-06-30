<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('id_customer')) {
			redirect('/', 'refresh');
		}
	}

	public function index()
	{
		$this->load->model('Morder');
		$this->Morder->tampil();
		$data['transaksi'] = $this->Morder->tampil();

		$this->load->view('header');
		$this->load->view('order', $data);
		$this->load->view('footer');
	}

	function detail($id_transaksi)
	{
		$this->load->model('Morder');
		$data['transaksi'] = $this->Morder->detail($id_transaksi);

		if($this->input->post()){
			$this->Morder->kirim_rating($this->input->post());
			$this->session->set_flashdata('pesan_sukses', 'Ulasan anda telah dikirim!');

			redirect('order/detail/'.$id_transaksi, 'refresh');
		}

		$this->load->view('header');
		$this->load->view('order_detail', $data);
		$this->load->view('footer');
	}
}
