<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("calon_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
        $this->load->model('pendaftar_model');
        if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function add_calon()
    {
        $id = $this->session->userdata('user_id');
        $pendaftar_id = $this->input->post('pendaftar_id');

        if ($pendaftar_id){ // ada vote yang di submit
            $kuota_vote = $this->calon_model->getBeasiswa()->kuota_vote;

            $limit = array();
            $calon = $this->pendaftar_model->getCalon($id);
            foreach($calon as $calon) {
                if ($calon->user_id == $id)
                {
                    $limit[] = $calon->pendaftar_id;
                }
            }

            $tambah = count($limit) + sizeof($pendaftar_id);

            if(sizeof($pendaftar_id) <= $kuota_vote || $tambah <= $kuota_vote)
            {
                for($i=0; $i < sizeof($pendaftar_id); $i++)
                {
                    $result = $this->calon_model->save_calon($pendaftar_id[$i], $id);
                }

                if($result != 0){
                    //pemberian suara berhasil
                    echo "<script>
                    alert('Selamat, pemberian suara sukses');
                    window.location='".site_url('dashboard')."';
                    </script>";
                }
            }
            else
            {
                echo "<script>
                alert('Maaf, Anda melebihi kuota vote');
                window.location='".site_url('dashboard')."';
                </script>";
            }
        }
        else {
            echo "<script>
            alert('Maaf, Anda belum memberikan suara');
            window.location='".site_url('dashboard')."';
            </script>";
        }
        
    }
}