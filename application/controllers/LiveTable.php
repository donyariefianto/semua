<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LiveTable extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LiveTable_model', 'MLiveTable');
    }

    function index()
    {
        $this->load->view("live_table");
    }

    function load_data()
    {
        $data = $this->MLiveTable->load_data();
        echo json_encode($data); // ubah array jadi json
    }
 
    // method simpan data ke db
    function insert_data()
    {
        $data = [
            'nim'        => $this->input->post('nim'),
            'nama'        => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan')
        ];
        $this->MLiveTable->insert_data($data);
    }

    //method udpate data
    function update_data()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->MLiveTable->update_data($data, $this->input->post('id'));
    }

    // method delete data
    function delete_data()
    {
        $this->MLiveTable->delete_data($this->input->post('id'));
    }
}
