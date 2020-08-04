<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

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

		$this->load->model('rekap_model', 'rekap');

		$activePeriode = $this->rekap->getActivePeriode();
		$periodeBeforeActive = $this->rekap->getAllPeriodeBeforeActive($activePeriode->id);
		$periodikPertahun = $this->rekap->getPeriodikPertahun($activePeriode->id);
		$kumulatifPertahun = $this->rekap->getKumulatifPertahun($activePeriode->id);
		$periodikActiveTahun = $this->rekap->getActivePeriodikTahun($activePeriode->id);
		$kumulatifActiveTahun = $this->rekap->getActiveKumulatifTahun($activePeriode->id);
		$periodikPeriode = $this->rekap->getPeriodikPeriode($activePeriode->id);
		$kumulatifPeriode = $this->rekap->getKumulatifPeriode($activePeriode->id);
		$keteranganPeriode = $this->rekap->getKeteranganPeriodik($activePeriode->id);

		// var_dump($activePeriode);
		// echo "<br>";
		// echo "<br>";
		// var_dump($periodeBeforeActive);
		// echo "<br>";
		// echo "<br>";
		// var_dump($periodikPertahun);
		// echo "<br>";
		// echo "<br>";
		// var_dump($kumulatifPertahun);
		// echo "<br>";
		// echo "<br>";
		// var_dump($periodikActiveTahun);
		// echo "<br>";
		// echo "<br>";
		// var_dump($kumulatifActiveTahun);
		// echo "<br>";
		// echo "<br>";
		// var_dump($periodikPeriode);
		// echo "<br>";
		// echo "<br>";
		// var_dump($kumulatifPeriode);
		// echo "<br>";
		// echo "<br>";
		// var_dump($keteranganPeriode);

		$data = array(
			'activePeriode' => $activePeriode,
			'periodeBeforeActive' => $periodeBeforeActive,
			'periodikPertahun' => $periodikPertahun,
			'kumulatifPertahun' => $kumulatifPertahun,
			'periodikActiveTahun' => $periodikActiveTahun,
			'kumulatifActiveTahun' => $kumulatifActiveTahun,
			'periodikPeriode' => $periodikPeriode,
			'kumulatifPeriode' => $kumulatifPeriode,
			'keteranganPeriode' => $keteranganPeriode,
			'periodikCount' => count($periodikPeriode) - 1  
		);

		$this->template->load('dashboard/template', 'rekap', 'Rekapitulasi', $data);
    }
}