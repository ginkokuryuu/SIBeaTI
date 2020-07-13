<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolaberita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berita_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["berita"] = $this->berita_model->getAll();
        $this->load->view("admin/kelolaberita/list", $data);
    }

    public function add()
    {
        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kelolaberita/new_form");
    }
}
