<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pendaftar_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function save_pendaftar($beasiswaid = 0, $biodataid = 0){
        $this->load->model('pendaftar_model');
		$result = $this->pendaftar_model->save_pendaftar($beasiswaid, $biodataid);
        if($result != 0){
            //pendaftaran berhasil
            echo "<script>
            alert('Selamat, pendaftaran sukses');
            window.location='".site_url('pengajuan/periode')."';
            </script>";
        }
        else{
            //pendaftaran gagal
            echo "<script>
            alert('Maaf, pendaftaran gagal');
            window.location='".site_url('pengajuan/periode')."';
            </script>";
        }
    }
}
