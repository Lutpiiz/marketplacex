<?php
class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        //jika tidak ada tiket bioskop, maka suruh login
        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function index() {

        //panggil model Mkategori
        // $this->load->model("Mkategori");
        // $data["kategori"] = $this->Mkategori->tampil();

        // $this->load->model('Mmember');
        // $data["jumlah_member_distrik"] = $this->Mmember->jumlah_member_distrik();

        $this->load->view("header");
        $this->load->view("home");
        $this->load->view("footer");
    }
}