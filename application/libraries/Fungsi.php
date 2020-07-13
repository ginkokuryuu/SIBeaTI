<?php

class Fungsi {
    protected $ci;

    function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('modules/login/user_model');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_model->get($user_id)->row();
        return $user_data;
    }

    function biodata_login() {
        $this->ci->load->model('modules/login/user_model');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_model->getb($user_id)->row();
        return $user_data;
    }
}
