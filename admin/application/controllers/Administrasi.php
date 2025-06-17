<?php
class Administrasi extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function index() {
        $this->load->model("Madministrasi");
        $data['customer'] = $this->Madministrasi->tampil();

        $this->load->view("header");
        $this->load->view("administrasi_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_customer){

        $this->load->model('Madministrasi');
        $data["customer"] = $this->Madministrasi->detail($id_customer);

        $this->load->model('Mtransaksi');
        $data['pesanan'] = $this->Mtransaksi->riwayat_pesan($id_customer);

        $this->load->view('header');
        $this->load->view('administrasi_detail', $data);
        $this->load->view('footer');
    }

    function tambah() {
        $inputan = $this->input->post();
    
        $this->form_validation->set_rules("nama_customer", "Nama customer", "required");
        $this->form_validation->set_rules("email_customer", "Email", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_rules("no_telepon", "No. telepon", "required");
        $this->form_validation->set_rules("alamat", "Alamat", "required");
    
        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("valid_email", "Format %s tidak valid");
    
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Madministrasi');
    
            $inputan['tanggal_daftar'] = date('Y-m-d H:i:s');
            $inputan['password'] = sha1($inputan['password']);
    
            $this->Madministrasi->simpan($inputan);
    
            $this->session->set_flashdata('pesan_sukses', 'Data customer berhasil disimpan');
    
            redirect('administrasi', 'refresh');
        }
    
        $this->load->view("header");
        $this->load->view("administrasi_tambah.php");
        $this->load->view("footer");
    }

    function delete($id_customer) {
        $this->load->model('Madministrasi');
        if ($this->Madministrasi->delete($id_customer)) {
            $this->session->set_flashdata('success', 'Data customer berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data customer gagal dihapus.');
        }
        redirect('Administrasi');
    }
    
}