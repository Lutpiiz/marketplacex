<?php
class Layanan extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }

    function index() {
        $this->load->model("Mlayanan");

        $data["layanan"] = $this->Mlayanan->tampil();

        $this->load->view("header");
        $this->load->view("layanan_tampil", $data);
        $this->load->view("footer");
    }

    function tambah() {
        $inputan = $this->input->post();

		$this->form_validation->set_rules("nama_layanan", "Nama layanan", "required");
		$this->form_validation->set_rules("deskripsi_layanan", "Deskripsi layanan", "required");
		$this->form_validation->set_rules("harga_layanan", "Harga layanan", "required");
		$this->form_validation->set_rules("estimasi_layanan", "Estimasi layanan", "required");

		$this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run()==TRUE) {
            $this->load->model('Mlayanan');

            $this->Mlayanan->simpan($inputan);

            $this->session->set_flashdata('pesan_sukses', 'Data layanan tersimpan');

            redirect('layanan', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("layanan_tambah.php");
        $this->load->view("footer");
    }

    function hapus($id_layanan) {
        $this->load->model('Mlayanan');
        $this->Mlayanan->hapus($id_layanan);
        $this->session->set_flashdata('pesan_sukses', 'layanan telah dihapus');

        redirect('layanan', 'refresh');
    }

    function edit($id_layanan) {
        $this->load->model('Mlayanan');
        $data['layanan'] = $this->Mlayanan->detail($id_layanan);

        $inputan = $this->input->post();

		$this->form_validation->set_rules("nama_layanan", "Nama layanan", "required");
		$this->form_validation->set_rules("deskripsi_layanan", "Deskripsi layanan", "required");
		$this->form_validation->set_rules("harga_layanan", "Harga layanan", "required");
		$this->form_validation->set_rules("estimasi_layanan", "Estimasi layanan", "required");

		$this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run()==TRUE) {
            $this->Mlayanan->edit($inputan, $id_layanan);
            $this->session->set_flashdata('pesan_sukses', 'layanan telah diubah');

            redirect('layanan', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('layanan_edit', $data);
        $this->load->view('footer');
    }
}