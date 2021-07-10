<?php

class ProductCategory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_rules('category_name', 'Category_name', 'required|trim');
        $this->form_validation->set_rules('category_description', 'Category_description', 'required|trim');
    }

    public function index()
    {
        // data konten
        $data['judul'] = "Product Category Management";
        $data['url'] = "admin/productcategory/add_category";
        $data['category'] = $this->ProductCategory_model->get_data();

        // load template and variabels
        $tmp['contents'] = $this->load->view('admin/productcategory/productcategory_view', $data, TRUE);
        $this->load->view('admin/template/template', $tmp);
    }

    public function add_category()
    {
        // data konten
        $data['judul'] = "Form Category";
        $data['url'] = "admin/productcategory/add_category";
        $data['category'] = $this->ProductCategory_model->get_data();

        if ($this->form_validation->run() == false) {
            // load template and variabels
            $tmp['contents'] = $this->load->view('admin/productcategory/productcategory_add', $data, TRUE);
            $this->load->view('admin/template/template', $tmp);
        } else {
            $data = [
                'category_name'         => htmlspecialchars($this->input->post('category_name', true)),
                'category_description'  => htmlspecialchars($this->input->post('category_description', true)),
            ];

            $this->db->insert('product_category', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data added</div>');
            redirect('admin/productcategory');
        }
    }

    public function edit_category($id)
    {

        // data konten
        $data['judul']  = "Edit Category";
        $data['url'] = "admin/productcategory/add_category";
        $data['category']   = $this->db->get_where('product_category', ['product_category_id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            // load template and variabels
            $tmp['contents'] = $this->load->view('admin/productcategory/productcategory_edit', $data, TRUE);
            $this->load->view('admin/template/template', $tmp);
        } else {
            $category_name = $this->input->post('category_name');
            $category_description = $this->input->post('category_description');

            $this->db->set('category_name', $category_name);
            $this->db->set('category_description', $category_description);
            $this->db->where('product_category_id', $id);
            $this->db->update('product_category');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been edited </div>');
            redirect('admin/productcategory');
        }
    }

    public function delete_category($id)
    {
        $this->db->delete('product_category', ['product_category_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been deleted </div>');
        redirect('admin/productcategory');
    }
}
