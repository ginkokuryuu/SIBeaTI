<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_model extends CI_Model
{
    private $_table = "calon";

    public $calon_id;
    public $user_id;
    public $pendaftar_id;

    //cek apakah yang divote sama (voter)
    public function voting_exists($pendaftarid, $id)
    {
        $this->db->where(['pendaftar_id'=>$pendaftarid, 'user_id'=>$id]);
        $query = $this->db->get('calon');
        if ($query->num_rows() > 0){
            return 1;
        }
        else{
            return 0;
        }
    }

    //insert ke tabel calon (voter)
    public function save_calon($pendaftarid, $id)
    {
        $this->user_id = $id;
        $this->pendaftar_id = $pendaftarid;
        $status = $this->voting_exists($pendaftarid, $id); 
        if( $status == 0)
        {
            return $this->db->insert($this->_table, $this);
        }
        else
        {
            echo "<script>
            alert('Maaf terdapat peserta yang sama dengan voting sebelumnya');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }

    // data calon penerima (tim seleksi)
    public function getAll()
    {
        $this->db->select('count(calon.calon_id) as jumlah, biodata.biodata_id, biodata.nrp, biodata.nama_lengkap, biodata.penghasilan_ortu, biodata.ukt, biodata.ipk, calon.calon_id');
        $this->db->from('calon');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
		$this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status_pemilihan'=>'Dibuka']);
        $this->db->group_by('pendaftar.pendaftar_id');
        $query = $this->db->get();
        return $query->result();
    }

    // data penerima penerima (tim seleksi)
    public function getPenerima()
    {
        $this->db->select('penerima.penerima_id, penerima.calon_id');
        $this->db->from('penerima'); 
        $this->db->join('calon', 'calon.calon_id = penerima.calon_id');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id'); 
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status_pemilihan'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->result();
    }

    // data beasiswa yg status pemilihannya dibuka (tim seleksi)
    public function getBeasiswa()
    {
        $this->db->select("*");
        $this->db->from('beasiswa');  
        $this->db->where(['status_pemilihan'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->row();
    }
}