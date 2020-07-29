<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$this->load->model('transaksi');
		$donatur = $this->transaksi->getDonatur();
		$periode=$this->transaksi->getPeriode();
		$akun=$this->transaksi->getTotalAkun();
		$t_periode=$this->transaksi->getPeriodeTahunan();
		$counts = $this->transaksi->getAllSaldo();
		$t_bulan = $this->transaksi->getPeriodeTahunBulan();
		$kategori = $this->transaksi->getPeriodeTahunDetail();
		$total = $this->transaksi->getTotal();
		$data = array(
			'periode' => $periode,
			'donatur' => $donatur,
			'counts' => $counts,
			'akun' => $akun,
			't_periode' => $t_periode,
			'kategori' =>$kategori,
			'total' => $total,
			't_bulan' => $t_bulan,
		);
        $this->template->load("dashboard/template", "laporan/laporan", "Laporan", $data);
		//load("dashboard/template", "viewFolder/view", "Header")
    }
    

}
