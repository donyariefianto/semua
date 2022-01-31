<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        if($this->session->userdata('status') != "login")
        {
			redirect(base_url("auth"));
		}
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('DataUser/index');
        $this->load->view('footer');
    }

    public function tampilkanData()
    {
        $data = $this->User_model->getAllUser();
        echo json_encode($data);
    }

    public function simpanData()
    {
        $data = $this->User_model->inputData();
        echo json_encode($data);
    }

    public function update()
    {
        $data = $this->User_model->updateData();
        echo json_encode($data);
    }

    public function hapus()
    {
        $data = $this->User_model->hapusData();
        echo json_encode($data);
    }
    // public function index()
    // {
    //     $data['data_user'] = $this->User_model->getData();
    //     $this->load->view('header');
    //     $this->load->view('DataUser/user',$data);
    //     $this->load->view('footer');
    // }
    // function simpan(){
    //     $kode = $this->User_model->kode();   
    //     $last = (int) substr($kode,3); 
    //     $a = sprintf("%05s", $last);
    //     $qr = ($a == 0 ? 1 : $a + 1);
    //     $nama = $this->input->post('nama');
    //     $exprd = $this->input->post('exprd');
    //     $jumlah = $this->input->post('jumlah');
    //     $value = null;
    //     $date = new DateTime();
    //     $tgl = $date->format('Y-m-d');
    //     for ($i = $qr; $i < $jumlah + $qr; $i++) {
    //         $qrCode = new Endroid\QrCode\QrCode('VCR'.sprintf("%05s",$i)); // mengambil data sebagai data  QR code
    //         $qrCode->writeFile('assets/qr/' .'VCR'.sprintf("%05s",$i). '.png');
    //         $value .= ",('".$nama."','".$tgl."','".'VCR'.sprintf("%05s",$i)."','".$exprd."','1')";  
    //     }
    //     $sql = "INSERT INTO `vcr` (`agent`, `tgl`, `qrcode`, `expired`, `valid`) VALUES ".trim($value, ',');
    //     $this->db->query($sql);
    //     redirect('User'); //redirect 
    // }
    // public function print(){
    //     $data['data_user'] = $this->User_model->getVcr();
    //     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    //     $this->load->view('report',$data);
    //     $html = $this->load->view('report',[],true);        
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
    // }
    // public function tes(){
    //     $jumlah=($this->input->post('tes'));
    //     $value = null;
    //     for ($i = 1; $i <= $jumlah; $i++) {
    //             $value .= ",('".$i."')";  
    //     }
    //     if (isset($jumlah)) {
    //         $sql = "INSERT INTO `users` ('name') VALUES ".trim($value, ',');
            
    //         print_r($sql);
    //     }
    // $this->load->view('tesa');
    // }
} 