<?php
class Logout extends CI_Controller {
    public function index() {
        //menghancurkan tiket bioskop yang dibuat saat login tadi
        $this->session->unset_userdata('id_customer');
        $this->session->unset_userdata('email_customer');
        $this->session->unset_userdata('nama_customer');

        //redirect ke halaman login
        $this->session->set_flashdata('pesan_sukses', 'Anda telah logout');
        redirect('/', 'refresh');
    }
}
?>