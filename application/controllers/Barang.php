<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //load model
        $this->load->model('model');
    }

    /**
     * Get All Data
     */
    public function gets(){
        $blog = $this->model->gets();
        $data = $blog;
        $posts = array();
        foreach ($blog->result() as $hasil)
        {
            $posts[] = array(
                'id' => $hasil->id,
                'nama_brg' => $hasil->nama_brg,
                'jumlah' => $hasil->jumlah,
                'keterangan' => $hasil->keterangan 
            );
        }
        $response=array(

			'status' => 1,
			'message' =>'Get Data.',
			'data' => $posts
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    /**
     * Get Single Data
     */
    public function get($id){
        $blog = $this->model->get($id);
        $data = $blog;
        $posts = array();
        foreach ($blog->result() as $hasil)
        {
            $posts[] = array(
                'id' => $hasil->id,
                'nama_brg' => $hasil->nama_brg,
                'jumlah' => $hasil->jumlah,
                'keterangan' => $hasil->keterangan 
            );
        }
        if($posts!=null){
            $response=array(

                'status' => 1,
                'message' =>'Get Data.',
                'data' => $posts
            );
        }else{
            $response=array(

                'status' => 0,
                'message' =>'Get Data Failed.',
            );
        }       
        header('Content-Type: application/json');
        echo json_encode($response); 
    }
    /**
     * Insert Data
     */
    public function insrt(){
		$data['nama_brg']= $_POST['nama_brg'] ;
		$data['jumlah']= $_POST['jumlah']  ;
        $data['keterangan']= $_POST['keterangan'] ;

        $result = $this->model->insrt($data);
        if($result == true)
		{
            $response=array(
                'status' => 1,
                'message' =>'Data Added Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' =>'Data Addition Failed.'
            );
        }			
    header("HTTP/1.1 201 OK");
    header('Content-Type: application/json');
    echo json_encode($response);
    }
    /**
     * Update Data
     */
    public function updt($id){
        
		$data['nama_brg']=$_POST['nama_brg'];
		$data['jumlah']=$_POST['jumlah'];
        $data['keterangan']=$_POST['keterangan'];

        $result = $this->model->updt($data,$id);
        if($result == true)
		{
            $response=array(
                'status' => 1,
                'message' =>'Data Updated Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' =>'Data Updation Failed.'
            );
        }			
    header('Content-Type: application/json');
    echo json_encode($response);
    }
    /**
     * Delete Data
     */
    public function dlt($id){

        $result = $this->model->dlt($id);
        if($result == true)
		{
            $response=array(
                'status' => 1,
                'message' =>'Data Deleted Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' =>'Data Deletion Failed.'
            );
        }			
        
    header('Content-Type: application/json');
    echo json_encode($response);
    }


    public function hash(){
        //get data dari model
        $blog = $this->model->gets();
        //masukkan data kedalam variabel
        $data = $blog;
        //deklarasi variabel array
        // $response = array();
        $posts = array();
        //lopping data dari database
        foreach ($blog->result() as $hasil)
        {
            $posts[] = array(
                'id' => $hasil->id,
                'nama_brg'     => $hasil->nama_brg,
                'jumlah'     => $hasil->jumlah,
                'keterangan'     => $hasil->keterangan 
            );
        }

        $response=array(

			'status' => 1,
			'message' =>'Get Data.',
			'data' => $posts
        );
        header('Content-Type: application/json');
        echo json_encode($response);

    }

    public function tes(){
        //get data dari model
        $blog = $this->model->get_all();
        //masukkan data kedalam variabel
        $data['data'] = $blog;
        //deklarasi variabel array
        $response = array();
        $posts = array();
        //lopping data dari database
        foreach ($blog->result() as $hasil)
        {
            $posts[] = array(
                'id' => $hasil->id,
                'nama_brg'     => $hasil->nama_brg,
                'jumlah'     => $hasil->jumlah,
                'keterangan'     => $hasil->keterangan 
            );
        }
        $response['data'] = $posts;
        header('Content-Type: application/json');
        echo json_encode($response);

    }
  

}