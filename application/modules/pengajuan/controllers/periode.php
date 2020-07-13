<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("beasiswa_model");
        $this->load->library('form_validation');
        $this->load->model("login/user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["beasiswa"] = $this->beasiswa_model->getAll();
        $this->load->view("periode/list", $data);
    }
}
