<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index()
    {
        $id = $this->session->userdata['user_id'];
        $data["biodata"] = $this->biodata_model->getbyId($id);
        if ($data){
            $this->template->load('template', 'diri/list_diri', 'Biodata Diri', $data);
        }
    }

    public function save_foto()
    {
        $id = $this->session->userdata['user_id'];
        $username = $this->session->userdata['username'];;
        if ($this->input->post()) {
            $this->biodata_model->save_foto($id, $username); 
            redirect(site_url('biodata/diri'));
        }
    }

    public function save_pribadi()
    {
        $id = $this->session->userdata['user_id'];
        $data = $this->input->post(null, TRUE);
		if(isset($data['save_pribadi'])){
            $this->biodata_model->save_pribadi($id, $data); 
            redirect(site_url('biodata/diri'));
        }
    }

    public function save_ortu()
    {
        $id = $this->session->userdata['user_id'];
        $data = $this->input->post(null, TRUE);
        if(isset($data['save_ortu'])){
            $this->biodata_model->save_ortu($id, $data);
            redirect(site_url('biodata/diri'));
        }
    }

    public function save_rumah()
    {
        $id = $this->session->userdata['user_id'];;
        $username = $this->session->userdata['username'];;
        $data = $this->input->post(null, TRUE);
        if(isset($data['save_rumah'])){
            $this->biodata_model->save_rumah($id, $username, $data); 
            redirect(site_url('biodata/diri'));
        }
    }

    public function save_cerita()
    {
        $id = $this->session->userdata['user_id'];;
        $data = $this->input->post(null, TRUE);
        if(isset($data['save_cerita'])){
            $this->biodata_model->save_cerita($id, $data); 
            redirect(site_url('biodata/diri'));
        }
    }

    // gak pake script alert soalnya dia ga muncul (ke-redirect duluan, alert nya jadi ga muncul)
    // tambahin alert aja kalo bisa buat dia muncul setelah redirect
}