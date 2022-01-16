<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login")
        {
			redirect(base_url("auth"));
		}
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('utama');
        $this->load->view('footer');
    }
}