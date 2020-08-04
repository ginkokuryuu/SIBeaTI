<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index($biodataid = 0)
    {
        $data['biodataid'] = $biodataid;
        $data["biodata"] = $this->biodata_model->getbyId($biodataid);
        $role = $this->session->userdata('role');
        if ($data){
            if ($role == 'voter'){
                $this->template->load('templatevoter', 'diri/list_diri.php', 'Biodata Diri', $data);
            }
            else if ($role == 'selektor'){
                $this->template->load('templateselektor', 'diri/list_diri.php', 'Biodata Diri', $data);
            }
            else {
                redirect(site_url('auth'));
            }
        }
    }
}