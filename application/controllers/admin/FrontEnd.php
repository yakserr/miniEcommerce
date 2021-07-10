<?php

class FrontEnd extends CI_Controller
{

    public function index()
    {

        $data['category'] = $this->ProductCategory_model->get_data();
        $data['product'] = $this->Product_model->get_data();

        $this->load->view('frontend/fe', $data);
    }
}
