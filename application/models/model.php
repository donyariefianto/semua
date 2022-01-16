<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {

    public function gets()
    {
        return $this->db->get("barang");
    }
    public function get($id)
    {
        $this->db->where('id',$id);
        return $this->db->get("barang");
    }
    public function insrt($data)
    {
        return $this->db->insert('barang', $data);
    }
    public function updt($data,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('barang', $data);
    }
    public function dlt($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('barang');
    }
    public function login($email,$pass)
    {
        $multipl = array('email' => $email,'pass' => $pass);  
        $this->db->where($multipl);
        return $this->db->get('useracces');
    }
    function graph()
    {
        $data = $this->db->query("SELECT * from datapenduduk");
		return $data->result();
    }

}