<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa_model extends CI_Model
{
    private $_table = "beasiswa";

    public $beasiswa_id;
    public $nama;
    public $tahun;
    public $periode;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $kuota_beasiswa;
    public $kuota_vote;
    public $status_beasiswa;
    public $status_pemilihan;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
            
            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required'],

            ['field' => 'periode',
            'label' => 'Periode',
            'rules' => 'required'],

            ['field' => 'tanggal_mulai',
            'label' => 'Tanggal_mulai',
            'rules' => 'required'],

            ['field' => 'tanggal_selesai',
            'label' => 'Tanggal_selesai',
            'rules' => 'required']
        ];
    }

    public function getAll($id)
    {
        $beasiswa = $this->db->get($this->_table)->result_array();
        $pendaftar = $this->db->get_where("pendaftar", ["biodata_id" => $id])->result_array();

        // cek mahasiswa sudah mendaftar beasiswa tersebut atau belum 
        for ($i = 0; $i < count($beasiswa); $i++){
            $beasiswa[$i]["status_daftar"] = "0";
            for ($j = 0; $j < count($pendaftar); $j++){
                if ($beasiswa[$i]["beasiswa_id"] == $pendaftar[$j]["beasiswa_id"]){
                    $beasiswa[$i]["status_daftar"] = "1";   // mahasiswa sudah daftar di beasiswa tersebut
                }
            }
        }
        // convert array to object
        $result = json_decode(json_encode($beasiswa), FALSE);
        return $result;
    }
}
