<?php
class Transaksi extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function index() {
        $this->load->model("Mtransaksi");
        $data['transaksi'] = $this->Mtransaksi->tampil();

        $this->load->view("header");
        $this->load->view("transaksi_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_transaksi) {
        $this->load->model('Mtransaksi');

        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);

        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }

    public function proses($id_transaksi) {
        $this->load->model('Mtransaksi');

        $updated = $this->Mtransaksi->proses($id_transaksi);

        if ($updated) {
            $this->session->set_flashdata('pesan_sukses', 'Status transaksi berhasil diubah menjadi diproses.');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal mengubah status transaksi.');
        }

        redirect('transaksi/detail/' . $id_transaksi);
    }

    public function selesai($id_transaksi) {
        $this->load->model('Mtransaksi');

        $updated = $this->Mtransaksi->selesai($id_transaksi);

        if ($updated) {
            $this->session->set_flashdata('pesan_sukses', 'Status transaksi berhasil diubah menjadi selesai.');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal mengubah status transaksi.');
        }

        redirect('transaksi/detail/' . $id_transaksi);
    }

    public function batal($id_transaksi) {
        $this->load->model('Mtransaksi');
        $updated = $this->Mtransaksi->batal($id_transaksi);

        if ($updated) {
            $this->session->set_flashdata('pesan_sukses', 'Pesanan berhasil dibatalkan.');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal membatalkan pesanan.');
        }

        redirect('transaksi/detail/' . $id_transaksi);
    }


}