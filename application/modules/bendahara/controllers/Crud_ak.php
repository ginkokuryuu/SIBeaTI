<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_ak extends CI_Controller {

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
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }

        $this->session->set_userdata('prev_url', current_url());

        $this->load->model('akun');
        $this->load->model('kategori');

        $allAkun = $this->akun->getAll();
        $allKategori = $this->kategori->getAll();

        $data = array(
            'allAkun' => $allAkun,
            'allKategori' => $allKategori
        );

        $this->template->load('dashboard/template', 'crudAK', 'CRUD AK', $data);
    }

    public function createKategori(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('kategori');
            $data = $this->input->post(null, TRUE);

            if(isset($data['nama-kt'])){
                $this->kategori->create($data['nama-kt']);
    
                redirect($this->session->userdata('prev_url'));
            }
        }
    }

    public function createAkun(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('akun');
            $data = $this->input->post(null, TRUE);

            if(isset($data['nama-ak'])){
                $this->akun->create($data['nama-ak']);
    
                redirect($this->session->userdata('prev_url'));
            }
        }
    }

    public function deleteAkun($id){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('akun');

            $this->akun->delete($id);
    
            redirect($this->session->userdata('prev_url'));
        }
    }

    public function deleteKategori($id){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('kategori');

            $this->kategori->delete($id);
    
            redirect($this->session->userdata('prev_url'));
        }
    }
}
