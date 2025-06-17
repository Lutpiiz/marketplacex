<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_customer')) {
            redirect('/', 'refresh');
        }
    }

	public function index()
	{
        $inputan = $this->input->post();
		$this->form_validation->set_rules("nama_customer","Nama","required");
		$this->form_validation->set_rules("email_customer","Email","required");
		$this->form_validation->set_rules("alamat","Alamat","required");
		$this->form_validation->set_rules("no_telepon","Nomor Telepon","required");

		$this->form_validation->set_message("required","%s wajib diisi");

		if($this->form_validation->run()==TRUE){
            $this->load->model('Mcustomer');
            $id_customer = $this->session->userdata('id_customer');

            $this->Mcustomer->edit($inputan, $id_customer);
            $this->session->set_flashdata('pesan_sukses', "akun telah diubah");
            
			redirect('home','refresh');
        }

		$this->load->view('header');
		$this->load->view('account');
		$this->load->view('footer');
	}
}
