<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berita_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index()
    {
        $data["berita"] = $this->berita_model->getAll();
        if ($data){
            $this->template->load('dashboard/templateselektor', 'berita/list', 'Pengelolaan Berita', $data);
        }
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

        $this->template->load('dashboard/templateselektor', 'new/new_form.php', 'Tambah Berita');
    }

    public function edit($id = 0)
    {
        if (!isset($id)) redirect('kelolaberita/berita');
       
        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        if ($validation->run()) {
            $berita->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();

        $this->template->load('dashboard/templateselektor', 'edit/edit_form.php', 'Edit Berita', $data);
    }

    public function delete($id=0)
    {
        if (!isset($id)) show_404();
        
        if ($this->berita_model->delete($id)) {
            redirect(site_url('kelolaberita/berita'));
        }
    }
}