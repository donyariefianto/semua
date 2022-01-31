<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Harga_model");
        if($this->session->userdata('status') != "login")
        {
			redirect(base_url("auth"));
		}
    }
    public function index()
    {
        $data['kategori'] = $this->Harga_model->getData();
        $this->load->view('header');
        $this->load->view('MasterHarga/index',$data);
        $this->load->view('footer');
    }
    public function simpan(){
        $kategori = $this->input->post('kategori'); 
        $ins = $this->input->post('ins');
        $home = $this->input->post('home');
        $ormas = $this->input->post('ormas');
        $agen = $this->input->post('agen');
        $data = array('kategori' => $kategori,'ins' => $ins, 'home' => $home,'ormas' => $ormas,'agen' => $agen,);
        // print_r($data);die();
        $this->Harga_model->save($data);
        redirect('Harga');
    }
    public function update(){
        $kategori = $this->input->post('kategori'); 
        $ins = $this->input->post('ins');
        $home = $this->input->post('home');
        $ormas = $this->input->post('ormas');
        $agen = $this->input->post('agen');
        $id = $this->input->post('id_lama');
        $data = array('kategori' => $kategori,'ins' => $ins, 'home' => $home,'ormas' => $ormas,'agen' => $agen,);
        $this->Harga_model->update($data,$id);
        redirect('Harga');
    }
    function tampil()
    {
        $data['hasil'] = $this->Harga_model->getData();
        $this->load->view('MasterHarga/tampil',$data);
    }
    function tambah() 
    {
        $aksi=$this->input->post('aksi');
        $this->load->view('MasterHarga/tambah',$aksi);
    }
    function hapus($id)
    {
        $this->Harga_model->hpsitm($id); 
    }
    function edit()
    {
        $id=$this->input->post('id'); 
        $data['hasil']=$this->Harga_model->Getid($id);
        $this->load->view('MasterHarga/edit',$data);
    }
} 