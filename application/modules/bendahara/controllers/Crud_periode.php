<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_periode extends CI_Controller {

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

        $this->load->model('periode');

        $allperiode = $this->periode->getAll();

        $data = array(
            'allPeriode' => $allperiode
        );

        $this->template->load('dashboard/template', 'crudPeriode', 'CRUD Periode', $data);
    }

    public function save($id){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('periode');
            $data = $this->input->post(null, TRUE);

            if(isset($data['nama'])){
                $param = array(
                    'id' => $id,
                    'nama' => $data['nama'],
                    'deskripsi' => $data['deskripsi'],
                    'status' => $data['status']
                );

                $this->periode->save($param);
    
                redirect($this->session->userdata('prev_url'));
            }
        }
    }

    public function delete($id){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('periode');

            $this->periode->delete($id);
    
            redirect($this->session->userdata('prev_url'));
        }
    }
}
