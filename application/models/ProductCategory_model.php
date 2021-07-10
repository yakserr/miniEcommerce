<?php

class ProductCategory_model extends CI_model
{
    public function get_data()
    {
        return $this->db->get('product_category')->result_array();
    }
}
