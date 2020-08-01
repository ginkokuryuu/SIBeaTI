<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defpage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->has_userdata('username')){
			$role = $this->session->userdata('role');
			$id = $this->session->userdata('user_id');
			$data = array();
			if($role == 'mahasiswa'){
				$berita = $this->load->model('kelolaberita/berita_model', 'berita');
				$data['berita'] = $this->berita->getAll();
				$this->template->load('template', 'role/' . $role, 'Dashboard', $data);
			}

			else  if($role == 'voter'){
				$pendaftar = $this->load->model('Pendaftar_model', 'pendaftar');
				$data['pendaftar'] = $this->pendaftar->getAll();
				$data['calon'] = $this->pendaftar->getCalon($id); 
				$data['beasiswa'] = $this->pendaftar->getBeasiswa();
				$this->template->load('templatevoter', 'role/' . $role, 'Dashboard', $data);
			}
			
			else if($role == 'selektor'){
				$calon = $this->load->model('Calon_model', 'calon');
				$data['calon'] = $this->calon->getAll();
				$data['beasiswa'] = $this->calon->getBeasiswa();
				$data['penerima'] = $this->calon->getPenerima();
				$this->template->load('templateselektor', 'role/' . $role, 'Dashboard', $data);
			}
			
		}
		else{
			redirect(site_url('auth'));
		}
	}
}
