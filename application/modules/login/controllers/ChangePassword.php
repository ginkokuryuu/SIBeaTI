<?php

class ChangePassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index()
    {
        if ($this->input->post()) {
            if ($this->user_model->update()) {
                $this->session->set_flashdata('category_success', 'Password berhasil diubah');
                redirect(site_url('/login/changepassword'));
            }
            else {
                $this->session->set_flashdata('category_error', 'Password lama salah');
                redirect(site_url('/login/changepassword'));
            }
        }
        $this->load->view("password_page.php");
    }

}