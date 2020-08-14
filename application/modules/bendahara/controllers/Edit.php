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
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		$this->session->set_userdata('prev_url', current_url());

		$this->load->model('transaksi');

		$keys = array('Tanggal', 'Deskripsi', 'Debit', 'Kredit', 'Saldo', 'Periode', 'Jenis Transaksi', 'Akun', 'Kategori', 'Alias Donatur');

		$postData = $this->input->post(null, TRUE);

		if(isset($postData['search'])){
			$searchData = array(
				'deskripsi_s' => '%' . $postData['deskripsi_s'] . '%',
				'debit_s' => $postData['debit_s'] == '' ? '%%' : $postData['debit_s'],
				'kredit_s' => $postData['kredit_s'] == '' ? '%%' : $postData['kredit_s'],
				'saldo_s' => $postData['saldo_s'] == '' ? '%%' : $postData['saldo_s'],
				'periode_s' => '%' . $postData['periode_s'] . '%',
				'tanggal_s' => '%' . $postData['tanggal_s'] . '%',
				'id_jenis_s' => '%' . $postData['id_jenis_s'] . '%',
				'id_kategori_s' =>'%' . $postData['id_kategori_s'] . '%',
				'id_akun_s' => '%' . $postData['id_akun_s'] . '%',
				'donatur_s' => '%' . $postData['donatur_s'] . '%'
			);

			$datas = $this->transaksi->search($searchData);
		}
		else{
			$datas = $this->transaksi->getAll();
		}

		$akuns = $this->transaksi->getAkun();
		$kategoris = $this->transaksi->getKategori();
		$jenis_trans = $this->transaksi->getJenisTrans();

		$data = array(
			'keys' => $keys,
			'datas' => $datas,
			'akuns' => $akuns,
			'kategoris' => $kategoris,
			'jenis_trans' => $jenis_trans
		);

        $this->template->load("dashboard/template", "edit/edit", "Edit Data", $data);
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

		$keys = array('Tanggal', 'Deskripsi', 'Debit', 'Kredit', 'Saldo', 'Periode', 'Jenis Transaksi', 'Akun', 'Kategori', 'Alias Donatur');
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
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit')){
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
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit')){
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
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit')){
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
					'tanggal' => $data['pc-tanggal'],
					'inisial_donatur' => $data['pc-inisial_donatur'][$count]
				);
				
				$this->transaksi->split($param);
				$count++;
			}

			$this->transaksi->delete($data['pc-id']);
			redirect($this->session->userdata('prev_url'));
		}
	}

	public function transfer(){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		if($this->session->userdata('prev_url') == site_url('bendahara/edit/editAwal')){
			$this->load->model('temp_transaksi', 'transaksi');
		}
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit')){
			$this->load->model('transaksi');
		}
		else{
			echo "<script>
				alert('Mohon akses dari halaman yang benar');
				window.location='".site_url('dashboard')."';
				</script>";
		}
		
		$data = $this->input->post(null, TRUE);
		if(isset($data['tf-id'])){
			$param = array(
				'deskripsi' => $data['tf-deskripsi'],
				'debit' => $data['tf-debit'],
				'kredit' => $data['tf-kredit'],
				'kategori' => $data['tf-kategori'],
				'akun' => $data['tf-akun'],
				'akun_tujuan' => $data['tf-akun_tujuan'],
				'periode' => $data['tf-periode'],
				'tanggal' => $data['tf-tanggal'],
				'inisial_donatur' => $data['tf-inisial_donatur']
			);
			
			$this->transaksi->createBalance($param);
			$this->transaksi->transfer($param);

			redirect($this->session->userdata('prev_url'));
		}
	}

	public function saveDatabase(){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		$this->load->model('temp_transaksi');
		$this->load->model('transaksi');

		$dataToTransfer = $this->temp_transaksi->getRawNoId();

		foreach($dataToTransfer as $data){
			$this->transaksi->saveFromTemp($data);
		}

		$this->temp_transaksi->deleteAll();

		echo "<script>
			alert('Berhasil menyimpan ke database');
			window.location='".site_url('dashboard')."';
			</script>";
	}

	public function deleteAll(){
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		if($this->session->userdata('prev_url') == site_url('bendahara/edit/editAwal')){
			$this->load->model('temp_transaksi', 'transaksi');
		}
		else if($this->session->userdata('prev_url') == site_url('bendahara/edit')){
			$this->load->model('transaksi');
		}
		else{
			echo "<script>
				alert('Mohon akses dari halaman yang benar');
				window.location='".site_url('dashboard')."';
				</script>";
		}

		$this->transaksi->deleteAll();

		redirect(site_url('bendahara/upload'));
	}
}
