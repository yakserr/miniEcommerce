<?php

class User_model extends CI_model
{
    public function get_data()
    {
        return $this->db->get('user')->result_array();
    }
}
