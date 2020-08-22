<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Pdf');
        $this->load->model("auth/users");
        $this->load->model('dashboard/penerima_model');
        $this->load->model("beasiswa_model");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index($beasiswaid = 0)
    {
        $data['penerima'] = $this->penerima_model->getById($beasiswaid);
        $data['beasiswa'] = $this->beasiswa_model->getById($beasiswaid);
        $this->template->load('dashboard/templateselektor', 'penerima/list', 'Data Penerima', $data);
    }

    public function exportPdf($beasiswaid = 0)
	{
        // data yang mau ditampilin
        $penerima = $this->penerima_model->getById($beasiswaid);
        $beasiswa = $this->beasiswa_model->getById($beasiswaid);

        error_reporting(0);
 
        $pdf = new FPDF('P', 'mm','A4');
        $pdf->SetMargins(40,20, 40);
        $pdf->AddPage();
 
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'Daftar Penerima Beasiswa',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,7, ucwords($beasiswa->nama).' Tahun '.$beasiswa->tahun.' Periode '.$beasiswa->periode,0,1,'C');
        $pdf->Cell(10,10,'',0,1);
 
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(40,7,'NRP',1,0,'C');
        $pdf->Cell(80,7,'Nama Lengkap',1,1,'C');
 
        $pdf->SetFont('Arial','',10);
        foreach ($penerima as $key=>$data){
            $pdf->Cell(10,7,$key + 1,1,0, 'C');
            $pdf->Cell(40,7,$data->nrp,1,0, 'C');
            $pdf->Cell(2,7,'', 'LTB');
            $pdf->Cell(78,7,$data->nama_lengkap,'TRB',1);
        }
        $filename = 'Penerima ' . ucwords($beasiswa->nama) .' Tahun '.$beasiswa->tahun.' Periode '.$beasiswa->periode.'.pdf';
        $pdf->Output('D', $filename);
	}
}
