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
		$periode=$this->transaksi->getPeriode();
		$datas= array(
			array('donatur'=>'satu', 'periode'=>'202005'),
			array('donatur'=>'dua', 'periode'=>'202006'),
			array('donatur'=>'tiga', 'periode'=>'202006'),
			array('donatur'=>'empat', 'periode'=>'202007'),
			array('donatur'=>'lima', 'periode'=>'202007'),
			array('donatur'=>'enam', 'periode'=>'202007'),
		);
		$datas = json_decode (json_encode ($datas), FALSE);
		
		$counts= array(
			array('periodeSebelum'=>'saldo sebelum', 'penerimaan'=>'satu','pengeluaran'=>'satu','saldo'=>'saldo sekarang',  'periode'=>'202005'),
			array('periodeSebelum'=>'saldo sebelum', 'penerimaan'=>'satu','pengeluaran'=>'satu','saldo'=>'saldo sekarang',  'periode'=>'202006'),
			array('periodeSebelum'=>'saldo sebelum', 'penerimaan'=>'satu','pengeluaran'=>'satu','saldo'=>'saldo sekarang',  'periode'=>'202007'),
		);
		$counts = $this->transaksi->getAllSaldo();
		$data = array(
			'periode' => $periode,
			'datas' => $datas,
			'counts' => $counts,
		);
        $this->template->load("dashboard/template", "laporan/laporan", "Laporan", $data);
		//load("dashboard/template", "viewFolder/view", "Header")
    }
    

}
