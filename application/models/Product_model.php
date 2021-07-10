<?php

class Product_model extends CI_model
{
    public function get_data()
    {
        return $this->db->get('product')->result_array();
    }
}
