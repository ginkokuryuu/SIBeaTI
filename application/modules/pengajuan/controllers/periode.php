<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("beasiswa_model");
        $this->load->model("biodata/biodata_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $biodata_id = $this->biodata_model->getById($user_id)->biodata_id;
        $data["user_id"] = $user_id;
        $data["biodata_id"] = $biodata_id;
        $data["beasiswa"] = $this->beasiswa_model->getAll($biodata_id);
        $this->template->load('template', 'periode/list', 'Pengajuan', $data);
    }
}
