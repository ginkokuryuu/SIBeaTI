<?php

class Fungsi {
    protected $ci;

    function __construct() {
        $this->ci =& get_instance();
    }

    function periode_beasiswa() {
        $this->ci->load->model('beasiswa_model');
        $user_data = $this->ci->beasiswa_model->getPeriode()->row();
        return $user_data;
    }

    function biodata_beasiswa() {
        $this->ci->load->model('biodata/biodata_model');
        $user_data = $this->ci->biodata_model->getBiodata()->row();
        return $user_data;
    }
}
