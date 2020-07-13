<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index()
    {
        if ($this->input->post()) {
            if ($this->user_model->doLogin()) redirect(site_url('berita'));
        }
        $this->load->view("login_page.php");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }

}
