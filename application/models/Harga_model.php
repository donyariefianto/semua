<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_model extends CI_Model {
    public function getData(){
        $this->db->from('kategori_harga');
        $query = $this->db->get();
        return $query->result();
    }
    public function getVcr(){
        $this->db->from('vcr');
        $query = $this->db->get(); 
        return $query->result();
    }
    function save($data){
        $this->db->insert('kategori_harga',$data);
    }
    public function kode(){
        $query = $this->db->query("SELECT MAX(qrcode) as kode from vcr");
        $hasil = $query->row();
        return $hasil->kode;
    }
    function hpsitm($id){
        $this->db->where('id', $id);
        $this->db->delete('kategori_harga');
        
    }
    function Getid($id = '')
    {
      return $this->db->get_where('kategori_harga', array('id' => $id))->row();
    }
    function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('kategori_harga', $data);
    }
}