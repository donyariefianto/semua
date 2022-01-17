<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
        $this->load->view('DataUser/user');
        $this->load->view('footer');
    }
}