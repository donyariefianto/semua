<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
    }
    public function index(){
        $data['graph'] = $this->model->graph();
		$this->load->view('main', $data);
    }
}