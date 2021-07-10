<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Level', 'required|trim');
    }

    public function index()
    {
        // data konten
        $data['judul'] = "Dashboard";


        // load template and variabels
        $tmp['contents'] = $this->load->view('admin/dashboard', $data, TRUE);
        $this->load->view('admin/template/template', $tmp);
    }

    public function myuser()
    {
        // data konten
        $data['judul'] = "User Management";
        $data['url'] = "admin/user/add_user";
        $data['user'] = $this->User_model->get_data();

        // load template and variabels
        $tmp['contents'] = $this->load->view('admin/user/user_view', $data, TRUE);
        $this->load->view('admin/template/template', $tmp);
    }

    public function add_user()
    {
        // data konten
        $data['judul'] = "Form User";
        $data['url'] = "admin/user/add_user";

        if ($this->form_validation->run() == false) {
            // load template and variabels
            $tmp['contents'] = $this->load->view('admin/user/user_add', $data, TRUE);
            $this->load->view('admin/template/template', $tmp);
        } else {
            $data = [
                'username'  => htmlspecialchars($this->input->post('username', true)),
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'level'     => 3,
                'password'  => password_hash('default', PASSWORD_DEFAULT),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data added</div>');
            redirect('admin/user/myuser');
        }
    }

    public function edit_user($id)
    {

        // data konten
        $data['judul']  = "Edit User";
        $data['url'] = "admin/user/add_user";
        $data['user']   = $this->db->get_where('user', ['user_id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            // load template and variabels
            $tmp['contents'] = $this->load->view('admin/user/user_edit', $data, TRUE);
            $this->load->view('admin/template/template', $tmp);
        } else {
            $name = $this->input->post('name');
            $level = $this->input->post('level');

            $this->db->set('name', $name);
            $this->db->set('level', $level);
            $this->db->where('user_id', $id);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been edited </div>');
            redirect('admin/user/myuser');
        }
    }

    public function delete_user($id)
    {
        $this->db->delete('user', ['user_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been deleted </div>');
        redirect('admin/user/myuser');
    }
}
