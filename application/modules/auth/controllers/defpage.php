<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defpage extends CI_Controller {

	public function index()
	{
		if($this->session->has_userdata('username')){
			redirect(site_url('dashboard'));
		}		
		$this->template->load('template', 'login/index', "Login Admin");
	}

	public function login(){
		$this->load->model('users');

		$data = $this->input->post(null, TRUE);
		if(isset($data['login'])){
			$param = $this->users->doLogin($data);
			if($param['status']){
				//login berhasil
				$this->session->set_userdata($param);
				redirect(site_url('dashboard'));
			}
			else{
				//login gagal
				echo "<script>
				alert('Maaf, login gagal');
				window.location='".site_url('auth')."';
				</script>";
			}
		}
	}

	public function logout(){
		$param = array(
			'username',
			'role'
		);
		$this->session->unset_userdata($param);
		redirect(site_url('auth'));
	}

	public function test(){
		$this->template->load('template', 'login/test', 'test');
	}
}
