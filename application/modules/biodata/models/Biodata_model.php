<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model
{
    private $_table = "biodata";
    protected $ci;

    public $biodata_id;
    public $user_id;
    public $nama_lengkap;
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

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["biodata_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->biodata_id = uniqid();
        $this->user_id = $this->session->userdata('user_logged')->user_id;
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->nama_panggilan = $post["nama_panggilan"];
        $this->angkatan = $post["angkatan"];
        $this->semester = $post["semester"];
        $this->nrp = $post["nrp"];
        $this->ktp = $post["ktp"];
        $this->ukt = $post["ukt"];
        $this->ipk = $post["ipk"];
        $this->no_telepon = $post["no_telepon"];
        $this->asal_sma = $post["asal_sma"];
        $this->nama_bank = $post["nama_bank"];
        $this->nama_rekening = $post["nama_rekening"];
        $this->no_rekening = $post["no_rekening"];
        $this->beasiswa_lain = $post["beasiswa_lain"];
        $this->nama_beasiswa = $post["nama_beasiswa"];
        $this->nilai_beasiswa = $post["nilai_beasiswa"];
        $this->telepon_ortu = $post["telepon_ortu"];
        $this->pekerjaan_ortu = $post["pekerjaan_ortu"];
        $this->penghasilan_ortu = $post["penghasilan_ortu"];
        $this->link_google_map = $post["link_google_map"];
        $this->status_rumah = $post["status_rumah"];
        $this->kegiatan_selain_kuliah = $post["kegiatan_selain_kuliah"];
        $this->organisasi = $post["organisasi"];
        $this->kehidupan_sehari_hari = $post["kehidupan_sehari_hari"];
        $this->cerita_keluarga = $post["cerita_keluarga"];
        $this->dampak_covid = $post["dampak_covid"];
        $this->capaian_ke_depan = $post["capaian_ke_depan"];
        $this->ketika_menjadi_alumni = $post["ketika_menjadi_alumni"];
        $this->bersedia_kegiatan_alumni = $post["bersedia_kegiatan_alumni"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->biodata_id = $post["id"];
        $this->user_id = $this->session->userdata('user_logged')->user_id;
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->nama_panggilan = $post["nama_panggilan"];
        $this->angkatan = $post["angkatan"];
        $this->semester = $post["semester"];
        $this->nrp = $post["nrp"];
        $this->ktp = $post["ktp"];
        $this->ukt = $post["ukt"];
        $this->ipk = $post["ipk"];
        $this->no_telepon = $post["no_telepon"];
        $this->asal_sma = $post["asal_sma"];
        $this->nama_bank = $post["nama_bank"];
        $this->nama_rekening = $post["nama_rekening"];
        $this->no_rekening = $post["no_rekening"];
        $this->beasiswa_lain = $post["beasiswa_lain"];
        $this->nama_beasiswa = $post["nama_beasiswa"];
        $this->nilai_beasiswa = $post["nilai_beasiswa"];
        $this->telepon_ortu = $post["telepon_ortu"];
        $this->pekerjaan_ortu = $post["pekerjaan_ortu"];
        $this->penghasilan_ortu = $post["penghasilan_ortu"];
        $this->link_google_map = $post["link_google_map"];
        $this->status_rumah = $post["status_rumah"];
        $this->kegiatan_selain_kuliah = $post["kegiatan_selain_kuliah"];
        $this->organisasi = $post["organisasi"];
        $this->kehidupan_sehari_hari = $post["kehidupan_sehari_hari"];
        $this->cerita_keluarga = $post["cerita_keluarga"];
        $this->dampak_covid = $post["dampak_covid"];
        $this->capaian_ke_depan = $post["capaian_ke_depan"];
        $this->ketika_menjadi_alumni = $post["ketika_menjadi_alumni"];
        $this->bersedia_kegiatan_alumni = $post["bersedia_kegiatan_alumni"];
        $this->db->update($this->_table, $this, array('biodata_id' => $post['id']));
	}

    public function get($id)
    {
        $this->db->from('biodata');
        if($id != null){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }   
}
