<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata_model");
        $this->load->library('form_validation');
        $this->load->model("login/user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["biodata"] = $this->biodata_model->getbyId($this->session->userdata('user_logged')->user_id);
        $this->load->view("diri/list_diri", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('biodata/diri');
       
        $biodata = $this->biodata_model;
        $validation = $this->form_validation;
        $validation->set_rules($biodata->rules());

        if ($validation->run()) {
            $biodata->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["biodata"] = $biodata->getById($id);
        if (!$data["biodata"]) show_404();
        
        $this->load->view("diri/edit_diri", $data);
    }
}
