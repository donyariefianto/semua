<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function rule()
    {
        return [
            [
                'field' => 'username',  //samakan dengan atribute name pada tags input
                'label' => 'Username',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'password',  //samakan dengan atribute name pada tags input
                'label' => 'Password',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
        ];
    }
    function auth($where)
    {		
		return $this->db->get_where('users',$where);
	}	
}