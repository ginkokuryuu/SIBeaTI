<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	public function index()
	{
		if($this->session->has_userdata('username')){
			redirect(site_url('auth/test'));
		}		
		$this->template->load('template', 'register/index', "Register Mahasiswa");
	}

	public function admin(){
		if($this->session->has_userdata('username')){
			redirect(site_url('auth/test'));
		}		
		$this->template->load('template', 'register/admin', "Register Admin");
	}

	public function regis(){
        $this->load->model('users');

		$data = $this->input->post(null, TRUE);
		if(isset($data['register'])){
			$result = $this->users->save($data);
			if($result != 0){
				//registrasi berhasil
				echo "<script>
				alert('Selamat, registrasi sukses');
				window.location='".site_url('auth')."';
				</script>";
			}
			else{
				//registrasi gagal
				echo "<script>
				alert('Maaf, registrasi gagal');
				window.location='".site_url('auth/register')."';
				</script>";
			}
		}
    }
}
