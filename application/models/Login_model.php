<?php

class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function check()
    {
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        return $users;
    }
}
