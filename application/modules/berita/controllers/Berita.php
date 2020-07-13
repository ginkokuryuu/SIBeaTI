<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berita_model");
        $this->load->library('form_validation');
        $this->load->model("login/user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["berita"] = $this->berita_model->getAll();
        $this->load->view("list_berita", $data);
    }
}
