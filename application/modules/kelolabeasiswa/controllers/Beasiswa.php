<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("beasiswa_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index()
    {
        $data["beasiswa"] = $this->beasiswa_model->getAll();
        if ($data){
            $this->template->load('dashboard/templateselektor', 'beasiswa/list', 'Pengelolaan Beasiswa', $data);
        }
    }

    public function add()
    {
        $beasiswa = $this->beasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($beasiswa->rules());

        if ($validation->run()) {
            $beasiswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->template->load('dashboard/templateselektor', 'new/new_form.php', 'Tambah Beasiswa');
    }

    public function edit($id = 0)
    {
        if (!isset($id)) redirect('kelolabeasiswa/beasiswa');

        $beasiswa = $this->beasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($beasiswa->rules());

        if ($validation->run()) {
            $beasiswa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["beasiswa"] = $beasiswa->getById($id);
        if (!$data["beasiswa"]) show_404();

        $this->template->load('dashboard/templateselektor', 'edit/edit_form.php', 'Edit Beasiswa', $data);
    }

    public function delete($id=0)
    {
        if (!isset($id)) show_404();

        if ($this->beasiswa_model->delete($id)) {
            redirect(site_url('kelolabeasiswa/beasiswa'));
        }
    }
}