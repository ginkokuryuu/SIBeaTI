<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("penerima_model");
        $this->load->model("calon_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function add_penerima()
    {
        $calon_id = $this->input->post('calon_id');

        if ($calon_id){ // ada penerima yang di submit
            $kuota_beasiswa = $this->calon_model->getBeasiswa()->kuota_beasiswa;

            $limit = array();
            $penerima = $this->calon_model->getPenerima();
            foreach($penerima as $penerima) {
                $limit[] = $penerima->calon_id;
            }

            $tambah = count($limit) + sizeof($calon_id);

            if(sizeof($calon_id) <= $kuota_beasiswa && $tambah <= $kuota_beasiswa)
            {
                for($i=0; $i < sizeof($calon_id); $i++)
                {
                    $result = $this->penerima_model->save_penerima($calon_id[$i]);
                }

                if($result != 0){
                    // seleksi akhir berhasil
                    echo "<script>
                    alert('Selamat, seleksi akhir sukses');
                    window.location='".site_url('dashboard')."';
                    </script>";
                }
            }
            else
            {
                echo "<script>
                alert('Maaf, Anda melebihi kuota beasiswa');
                window.location='".site_url('dashboard')."';
                </script>";
            }
        }
        else {
            echo "<script>
            alert('Maaf, Anda belum memilih penerima yang layak');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }
}
