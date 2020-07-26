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
		$dummy=array
		  (
		  array('JumlahOrang'=>"Jumlah 1",'BesarBeasiswa'=>10,'tanggal'=>'30-04-2020'),
		  array('JumlahOrang'=>"Jumlah 2",'BesarBeasiswa'=>11,'tanggal'=>'30-04-2020'),
		  array('JumlahOrang'=>"Jumlah 3",'BesarBeasiswa'=>12,'tanggal'=>'30-04-2020')
		  );
		$datas = json_decode (json_encode ($dummy), FALSE);
		$data = array(
			'datas' => $datas,
		);
        $this->template->load("dashboard/template", "perencanaan/perencanaan", "Perencanaan", $data);
		//load("dashboard/template", "viewFolder/view", "Header")
	}
	
    public function calcJumlah()
	{
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		} 
		$data = $this->input->post(null, TRUE);
		$dummy = array('total_uang_beasiswa'=>20000); 
		$datas = json_decode (json_encode ($dummy), FALSE);
		//replace with $data = select count(saldo) where akun='beasiswa';
		$data = array(
			'datas' => $datas,
		);
        $this->template->load("dashboard/template", "perencanaan/calculatorMahasiswa", "Kalkulator Jumlah Orang", $data);
		//load("dashboard/template", "viewFolder/view", "Header")
	}
	
	public function calcUang()
	{
		if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
		} 
		$dummy=array
		  (
		  array('JumlahOrang'=>"Jumlah 1",'BesarBeasiswa'=>10,'tanggal'=>'30-04-2020'),
		  array('JumlahOrang'=>"Jumlah 2",'BesarBeasiswa'=>11,'tanggal'=>'30-04-2020'),
		  array('JumlahOrang'=>"Jumlah 3",'BesarBeasiswa'=>12,'tanggal'=>'30-04-2020')
		  );
		$datas = json_decode (json_encode ($dummy), FALSE);
		$data = array(
			'datas' => $datas,
		);
        $this->template->load("dashboard/template", "perencanaan/calculatorUang", "Kalkulator Jumlah Uang", $data);
		//load("dashboard/template", "viewFolder/view", "Header")
    }

}
