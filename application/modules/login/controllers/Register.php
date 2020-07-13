<?php

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index()
    {
        if ($this->input->post()) {
            if ($this->user_model->save()) redirect(site_url('/'));
        }
        $this->load->view("register_page.php");
    }

}