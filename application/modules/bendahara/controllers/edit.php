<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

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

		$this->session->set_userdata('prev_url', current_url());
		
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

		if($this->session->userdata('prev_url') == site_url('bendahara/edit/editAwal')){
			$this->load->model('temp_transaksi', 'transaksi');
		}
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit/')){
			$this->load->model('transaksi');
		}
		else{
			echo "<script>
				alert('Mohon akses dari halaman yang benar');
				window.location='".site_url('dashboard')."';
				</script>";
		}

        $data = $this->input->post(null, TRUE);

		if(isset($data['id'])){
			$result = $this->transaksi->save($data);
			if($result != 0){
                redirect($this->session->userdata('prev_url'));
			}
            else{
                //gagal
				echo "<script>
				alert('Maaf, edit gagal');
				window.location='" . $this->session->userdata('prev_url') . "';
				</script>";
            }
		}
	}

	public function delete($data){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		if($this->session->userdata('prev_url') == site_url('bendahara/edit/editAwal')){
			$this->load->model('temp_transaksi', 'transaksi');
		}
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit/')){
			$this->load->model('transaksi');
		}
		else{
			echo "<script>
				alert('Mohon akses dari halaman yang benar');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		if($data != NULL){
			$result = $this->transaksi->delete($data);
			if($result != 0){
                redirect($this->session->userdata('prev_url'));
			}
            else{
                //gagal
				echo "<script>
				alert('Maaf, hapus gagal');
				window.location='".$this->session->userdata('prev_url')."';
				</script>";
            }
		}
	}

	public function pecah(){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		if($this->session->userdata('prev_url') == site_url('bendahara/edit/editAwal')){
			$this->load->model('temp_transaksi', 'transaksi');
		}
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit/')){
			$this->load->model('transaksi');
		}
		else{
			echo "<script>
				alert('Mohon akses dari halaman yang benar');
				window.location='".site_url('dashboard')."';
				</script>";
		}
		
		$data = $this->input->post(null, TRUE);
		
		if(isset($data['pc-id'])){
			// cek debit kredit apakah valid
			$totalDebit = '0';
			$totalKredit = '0';

			foreach($data['pc-debit'] as $debit){
				$totalDebit = $totalDebit + $debit;
			}
			foreach($data['pc-kredit'] as $kredit){
				$totalKredit = $totalKredit + $kredit;
			}

			if($totalDebit != $data['pc-debit_awal']){
				echo "<script>
				alert('Maaf, data total debit tidak sesuai data awal');
				window.location='" . $this->session->userdata('prev_url') . "';
				</script>";
			}
			else if($totalKredit != $data['pc-kredit_awal']){
				echo "<script>
				alert('Maaf, data total kredit tidak sesuai data awal');
				window.location='" . $this->session->userdata('prev_url') . "';
				</script>";
			}

			$count = 0;
			// simpan
			foreach($data['pc-deskripsi'] as $nothing){
				$param = array(
					'deskripsi' => $data['pc-deskripsi'][$count],
					'debit' => $data['pc-debit'][$count],
					'kredit' => $data['pc-kredit'][$count],
					'kategori' => $data['pc-kategori'],
					'akun' => $data['pc-akun'],
					'periode' => $data['pc-periode'],
					'tanggal' => $data['pc-tanggal']
				);
				
				$this->transaksi->split($param);
				$count++;
			}

			$this->transaksi->delete($data['pc-id']);
			redirect($this->session->userdata('prev_url'));
		}
	}
}
