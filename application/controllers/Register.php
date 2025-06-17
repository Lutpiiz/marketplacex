<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
        $inputan = $this->input->post();

        $this->form_validation->set_rules("nama_customer", "Nama", "required");
        $this->form_validation->set_rules("email_customer", "Email", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_rules("no_telepon", "No. Telepon", "required");
        $this->form_validation->set_rules("alamat", "Alamat", "required");
    
        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("valid_email", "Format %s tidak valid");
    
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Mcustomer');
    
            $inputan['tanggal_daftar'] = date('Y-m-d H:i:s');
            $inputan['password'] = sha1($inputan['password']);
    
            $this->Mcustomer->register($inputan);
    
            $this->session->set_flashdata('pesan_sukses', 'Registrasi berhasil');
    
            redirect('/', 'refresh');
        }

		$this->load->view('register');
	}
}
