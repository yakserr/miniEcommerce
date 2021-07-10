<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_rules('product_code', 'Product_code', 'trim|required');
        $this->form_validation->set_rules('product_name', 'Product_name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required');
    }


    public function index()
    {
        // data konten
        $data['judul'] = "Product Management";
        $data['url'] = "admin/product/add_product";
        $data['product'] = $this->Product_model->get_data();


        // load template and variabels
        $tmp['contents'] = $this->load->view('admin/product/product_view', $data, TRUE);
        $this->load->view('admin/template/template', $tmp);
    }

    public function add_product()
    {
        // data konten
        $data['judul'] = "Form Product";
        $data['url'] = "admin/product/add_product";
        $data['category'] = $this->ProductCategory_model->get_data();
        $data['product'] = $this->Product_model->get_data();


        if ($this->form_validation->run() == false) {
            // load template and variabels
            $tmp['contents'] = $this->load->view('admin/product/product_add', $data, TRUE);
            $this->load->view('admin/template/template', $tmp);
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = "./././assets/uploads";
                $config['allowed_types'] = 'gif|jpg|png|PNG';
                $config['max_size']     = '100';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');

                    $data = [
                        'product_code'      => htmlspecialchars($this->input->post('product_code', true)),
                        'product_category'  => htmlspecialchars($this->input->post('product_category', true)),
                        'product_name'      => htmlspecialchars($this->input->post('product_name', true)),
                        'price'             => htmlspecialchars($this->input->post('price', true)),
                        'stock'             => htmlspecialchars($this->input->post('stock', true)),
                        'image'             => $new_image,
                        'posting_date'      => date('Y-m-d H:i:s'),
                        'product_owner'     => $this->session->userdata('id'),
                    ];
                    $this->db->insert('product', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data added</div>');
                    redirect('admin/product');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function edit_product($id)
    {

        // data konten
        $data['judul']  = "Edit Product";
        $data['url'] = "admin/product/add_product";
        $data['product']   = $this->db->get_where('product', ['product_id' => $id])->row_array();
        $data['category'] = $this->ProductCategory_model->get_data();

        if ($this->form_validation->run() == false) {
            // load template and variabels
            $tmp['contents'] = $this->load->view('admin/product/product_edit', $data, TRUE);
            $this->load->view('admin/template/template', $tmp);
        } else {
            $product_code = $this->input->post('product_code');
            $product_category = $this->input->post('product_category');
            $product_name = $this->input->post('product_name');
            $stock = $this->input->post('stock');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = "./././assets/uploads";
                $config['allowed_types'] = 'gif|jpg|png|PNG';
                $config['max_size']     = '100';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }

                $this->db->set('product_code', $product_code);
                $this->db->set('product_category', $product_category);
                $this->db->set('product_name', $product_name);
                $this->db->set('stock', $stock);
                $this->db->where('product_id', $id);
                $this->db->update('product');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been edited </div>');
                redirect('admin/product');
            }
        }
    }

    public function delete_product($id)
    {
        $this->db->delete('product', ['product_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been deleted </div>');
        redirect('admin/product');
    }
}
