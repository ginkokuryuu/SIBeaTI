<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratperintah extends CI_Controller {

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
		$this->load->model('penerima');
		$datas =  $this->penerima->getAll();
		$periode = $this->penerima->getPeriode();
		$data = array(
			'datas' => $datas,
			'periode'=>$periode,
		);
        $this->template->load("dashboard/template", "suratperintah/suratPerintah", "Print Surat Perintah", $data);
		//load("dashboard/template", "viewFolder/view", "Header")
	}
	
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function DownloadLaporan(){
		$data = $this->input->post(null, TRUE);
		$dummy=array
		  (
		  array('Nama'=>"Nama 1",'NRP'=>05111,'norek'=>'no rek1'),
		  array('Nama'=>"Nama 2",'NRP'=>05114,'norek'=>'no rek2'),
		  array('Nama'=>"Nama 3",'NRP'=>05113,'norek'=>'no rek3')
		  );
		$this->load->model('penerima');
		$datas = $this->penerima->getNameByPeriode($data['periode']);

		$pdf = new FPDF('P', 'pt', 'A4');
		$pdf->AddPage(); 
		$pdf->SetFont('Arial', '', 14);	
		$pdf->Cell(100, 16, "Surat Perintah Transfer",0,1);
		$pdf->Cell(100, 16, "Periode ".$data['periode']."",0,1);
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
        //$pdf->Cell(80,14,'NRP',1,0);
		$pdf->Cell(150,14,'Nama',1,0);
        $pdf->Cell(150,14,'Nomor Rekening',1,1);
		$pdf->SetFont('Arial','',10);
		foreach ($datas as $row){
            //$pdf->Cell(80,14,$row->NRP,1,0);
            $pdf->Cell(150,14,$row->nama,1,0);
            $pdf->Cell(150,14,$row->norek,1,1);
		}
		$pdf->Output();
    }
}
