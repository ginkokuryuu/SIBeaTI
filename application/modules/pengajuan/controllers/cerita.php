<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cerita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata/biodata_model");
        $this->load->library('form_validation');
        $this->load->model("login/user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["biodata"] = $this->biodata_model->getbyId($this->session->userdata('user_logged')->user_id);
        $this->load->view("cerita/list_cerita", $data);
    }
}
