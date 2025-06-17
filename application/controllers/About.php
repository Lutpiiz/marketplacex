<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_customer')) {
            redirect('/', 'refresh');
        }
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
}
