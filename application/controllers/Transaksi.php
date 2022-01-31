<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Transaksi_model');
    }
    function index(){
        $this->load->view('header');
        $this->load->view('DataTransaksi/index');
        $this->load->view('footer');
    }
 
    function Transaksi_data(){
        $data = $this->Transaksi_model->Transaksi_list();
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->Transaksi_model->save_Transaksi();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->Transaksi_model->update_Transaksi();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->Transaksi_model->delete_Transaksi();
        echo json_encode($data);
    }
}