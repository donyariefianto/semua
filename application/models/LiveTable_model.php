<?php
class LiveTable_model extends CI_Model
{
    //ambil semua data
    function load_data()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('mahsiswa');
        return $query->result_array();
    }

    // simpan data
    function insert_data($data)
    {
        $this->db->insert('mahsiswa', $data);
    }

    //update data
    function update_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('mahsiswa', $data);
    }

    //delete data
    function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahsiswa');
    }
}