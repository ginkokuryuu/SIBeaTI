<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata/biodata_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index($beasiswaid = 0, $userid = 0)
    {
        $data['beasiswaid'] = $beasiswaid;
        $data['userid'] = $userid;
        $data["biodata"] = $this->biodata_model->getbyId($userid);
        if ($data){
            $this->template->load('template', 'diri/list_diri', 'Pengajuan', $data);
        }
    }
}