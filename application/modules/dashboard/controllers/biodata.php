<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class biodata extends CI_Controller
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
        if ($data){
            $this->template->load('templatevoter', 'diri/list_diri.php', 'Biodata Diri', $data);
        }
    }
}