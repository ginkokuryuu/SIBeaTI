<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan extends CI_Controller {

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

        $this->load->model('perencanaan_model');
        $allPerencanaan = $this->perencanaan_model->getAll();
        $data = array(
            'allPerencanaan' => $allPerencanaan
        );

        $this->template->load('dashboard/template', 'perencanaan/index', 'Perencanaan Penyaluran', $data);
    }

    public function addNew(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('perencanaan_model');
            $data = $this->input->post(null, TRUE);
            
        }
    }

    public function calculator(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('perencanaan_model');
            $this->load->model('rekap_model');

            $activePeriode = $this->rekap_model->getActivePeriode();
            $saldoSekarang = $this->perencanaan_model->getSaldo($activePeriode->id);

            $data = array(
                'saldoSekarang' => $saldoSekarang[0]->saldo_berjalan
            );

            $this->template->load('dashboard/template', 'perencanaan/calculator', 'Kalkulator Perencanaan', $data);
        }
    }

    public function create(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('perencanaan_model');
            $data = $this->input->post(null, TRUE);
            
            if(isset($data['submit'])){
                $param = array(
                    'untuk_periode' => $data['untuk_periode'],
                    'jumlah_penerima' => $data['jumlah'],
                    'nominal_penyaluran' => $data['nominal']
                );

                $this->perencanaan_model->create($param);

                redirect($this->session->userdata('prev_url'));
            }

        }
    }

    public function save(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('perencanaan_model');
            $data = $this->input->post(null, TRUE);
            
            if(isset($data['submit'])){
                $this->perencanaan_model->save($data);

                redirect($this->session->userdata('prev_url'));
            }
        }
    }

    public function delete(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('perencanaan_model');
            $data = $this->input->post(null, TRUE);

            if(isset($data['submit'])){
                $this->perencanaan_model->delete($data['id']);

                redirect($this->session->userdata('prev_url'));
            }
        }
    }

    public function deleteStatus(){
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
        else{
            $this->load->model('perencanaan_model');
            $data = $this->input->post(null, TRUE);

            if(isset($data['submit'])){
                $this->perencanaan_model->deleteStatus($data['status']);

                redirect($this->session->userdata('prev_url'));
            }
        }
    }
}
