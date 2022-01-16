<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    public function index(){
        $data['gagal']=null;
        $username = $this->input->post('username');
		$password = $this->input->post("password");
        $where = array(
            'name' => $username,
            'password' => md5($password)
            );
        $validation = $this->form_validation;
		$validation->set_rules($this->Auth_model->rule());
		if ($validation->run()) {   
            $cek = $this->Auth_model->auth($where)->num_rows();
            if($cek > 0){
        
                $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
        
                $this->session->set_userdata($data_session);
                $data['gagal'] = 0;
                redirect('Dashboard');
            }else{
                $data['gagal'] = 1;
            }
        }
        $this->load->view('login',$data);
    }
    public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
    	redirect('Auth'); // Redirect ke halaman login
  	}
    function Tes(){
        $this->load->view('header');
        $this->load->view('tes');
        $this->load->view('footer');
    }
}