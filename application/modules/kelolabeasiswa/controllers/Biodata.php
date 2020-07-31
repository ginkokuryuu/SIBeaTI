<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dashboard/biodata_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
        $this->load->model('dashboard/pendaftar_model');
        $this->load->model("beasiswa_model");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index($beasiswaid = 0)
    {
        $data['pendaftar'] = $this->pendaftar_model->getById($beasiswaid);
        $data['beasiswa'] = $this->beasiswa_model->getById($beasiswaid);
        $this->template->load('dashboard/templateselektor', 'diri/index', 'Data Pendaftar', $data);
    }

    public function list($beasiswaid = 0, $biodataid = 0)
    {
        $data["biodata"] = $this->biodata_model->getbyId($biodataid);
        $data['beasiswa'] = $this->beasiswa_model->getById($beasiswaid);
        $this->template->load('dashboard/templateselektor', 'diri/list_diri', 'Biodata Diri', $data);
    }
}