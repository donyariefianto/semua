<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function getData(){
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
    public function getVcr(){
        $this->db->from('vcr');
        $query = $this->db->get();
        return $query->result();
    }
    function simpan($sql){
        $query = $this->db->insert('users',$sql);
    }
    public function kode(){
        $query = $this->db->query("SELECT MAX(qrcode) as kode from vcr");
        $hasil = $query->row();
        return $hasil->kode;
    }
    public function getAllUser()
    {
        return $this->db->get('users')->result();
    }

    public function inputData()
    {
        $data = [
            "name" => $this->input->post('name', true), 
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password', true)
        ];
        return $this->db->insert('user', $data);
    }
    
    function updateData()
    {
        $id = $this->input->post('id'); 
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->where('id', $id);
        return $this->db->update('user');
    }
    
    public function hapusData()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }
}