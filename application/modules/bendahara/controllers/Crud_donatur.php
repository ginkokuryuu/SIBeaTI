<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_donatur extends CI_Controller {

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

        $this->load->model('donatur');

        $allDonatur = $this->donatur->getAll();

        $data = array(
            'allDonatur' => $allDonatur
        );

        $this->template->load('dashboard/template', 'crudDonatur', 'CRUD Donatur', $data);
    }

    public function save($inisial){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('donatur');
            $data = $this->input->post(null, TRUE);

            if(isset($data['nama'])){
                $param = array(
                    'inisial' => $inisial,
                    'nama' => $data['nama']
                );

                $this->donatur->save($param);
    
                redirect($this->session->userdata('prev_url'));
            }
        }
    }

    public function delete($inisial){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('donatur');

            $this->donatur->delete($inisial);
    
            redirect($this->session->userdata('prev_url'));
        }
    }
}
