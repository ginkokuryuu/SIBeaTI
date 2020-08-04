<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model
{
    private $_table = "biodata";
    protected $ci;

    public $biodata_id;
    public $user_id;
    public $nama_lengkap;
    public $foto;
    public $nama_panggilan;
    public $angkatan;
    public $semester;
    public $nrp;
    public $ktp;
    public $ukt;
    public $ipk;
    public $no_telepon;
    public $asal_sma;
    public $nama_bank;
    public $nama_rekening;
    public $no_rekening;
    public $beasiswa_lain;
    public $nama_beasiswa;
    public $nilai_beasiswa;
    public $telepon_ortu;
    public $pekerjaan_ortu;
    public $penghasilan_ortu;
    public $link_google_map;
    public $status_rumah;
    public $foto_rumah;
    public $kegiatan_selain_kuliah;
    public $organisasi;
    public $kehidupan_sehari_hari;
    public $cerita_keluarga;
    public $dampak_covid;
    public $capaian_ke_depan;
    public $ketika_menjadi_alumni;
    public $bersedia_kegiatan_alumni;

    public function rules()
    {
        return [
            ['field' => 'nama_lengkap',
            'label' => 'Nama_Lengkap',
            'rules' => 'required'],
            
            ['field' => 'nama_panggilan',
            'label' => 'Nama_Panggilan',
            'rules' => 'required']
        ];
    }

    public function getById($id)
    {   
        return $this->db->get_where($this->_table, ["biodata_id" => $id])->row();;
    }

}
