<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('role') == "mahasiswa" or $this->session->userdata('role') == "voter"){
            echo "<script>
				alert('Maaf anda tidak berhak');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('users');
            $allUnverified = $this->users->getUnverified();
            $data = array(
                'allUnverified' => $allUnverified
            );

            $this->template->load('dashboard/template', 'verify', "Verify Akun", $data);
        }	
	}

	public function verif(){
        if($this->session->userdata('role') == "mahasiswa" or $this->session->userdata('role') == "voter"){
            echo "<script>
				alert('Maaf anda tidak berhak');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('users');

            $data = $this->input->post(null, TRUE);
            if(isset($data['submit'])){
                $this->users->verify($data['user_id']);
				redirect(site_url('auth/verify'));
            }
		}
	}
}
