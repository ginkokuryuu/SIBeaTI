<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class edit extends CI_Controller {

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
		
    }
    
    public function editAwal(){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}
		
		$this->load->model('temp_transaksi');

		$keys = array('Tanggal', 'Deskripsi', 'Debit', 'Kredit', 'Saldo', 'Periode', 'Jenis Transaksi', 'Akun', 'Kategori');
		$datas = $this->temp_transaksi->getAll();

		$akuns = $this->temp_transaksi->getAkun();
		$kategoris = $this->temp_transaksi->getKategori();
		$jenis_trans = $this->temp_transaksi->getJenisTrans();

		$data = array(
			'keys' => $keys,
			'datas' => $datas,
			'akuns' => $akuns,
			'kategoris' => $kategoris,
			'jenis_trans' => $jenis_trans
		);

        $this->template->load("dashboard/template", "edit/editAwal", "Edit Data", $data);
	}
	
	public function save(){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		$this->load->model('temp_transaksi');

        $data = $this->input->post(null, TRUE);

		if(isset($data['id'])){
			$result = $this->temp_transaksi->save($data);
			if($result != 0){
                redirect(site_url('bendahara/edit/editAwal'));
			}
            else{
                //gagal
				echo "<script>
				alert('Maaf, edit gagal');
				window.location='".site_url('bendahara/edit/editAwal')."';
				</script>";
            }
		}
	}
}
