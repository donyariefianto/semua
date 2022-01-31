<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
    function Transaksi_list(){
        $hasil = $this->db->get('Transaksi');
        return $hasil->result();
    }
 
    function save_Transaksi(){
        $data = array(
                'Transaksi_code'  => $this->input->post('Transaksi_code'), 
                'Transaksi_name'  => $this->input->post('Transaksi_name'), 
                'Transaksi_price' => $this->input->post('price'), 
            );
        $result=$this->db->insert('Transaksi',$data);
        return $result;
    }
 
    function update_Transaksi(){
        $Transaksi_code=$this->input->post('Transaksi_code');
        $Transaksi_name=$this->input->post('Transaksi_name');
        $Transaksi_price=$this->input->post('price');
 
        $this->db->set('Transaksi_name', $Transaksi_name);
        $this->db->set('Transaksi_price', $Transaksi_price);
        $this->db->where('Transaksi_code', $Transaksi_code);
        $result=$this->db->update('Transaksi');
        return $result;
    }
 
    function delete_Transaksi(){
        $Transaksi_code=$this->input->post('Transaksi_code');
        $this->db->where('Transaksi_code', $Transaksi_code);
        $result=$this->db->delete('Transaksi');
        return $result;
    }
}