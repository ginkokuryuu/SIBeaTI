<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $beasiswa_id;
    public $biodata_id;

    // data pendaftar di beasiswa yang status pemilihannya 'Dibuka'
    public function getAll()
    {
        $this->db->select('tahun, periode, nrp, nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id, biodata.biodata_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status_pemilihan'=>'Dibuka']);
        $query = $this->db->get();
        return $query->result();
    }

    // data pendaftar berdasarkan beasiswa id
    public function getById($id)
    {
        $this->db->select('tahun, periode, nrp, nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id, biodata.biodata_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.beasiswa_id'=>$id]);
        $query = $this->db->get();
        return $query->result();
    }
    
    // data calon yang sudah divote oleh user tertentu (hitung banyaknya ntar di view)
    public function getCalon($id)
    {
        $this->db->select('calon.calon_id, calon.user_id, calon.pendaftar_id');
        $this->db->from('calon'); 
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id'); 
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status_pemilihan'=>'Dibuka', 'calon.user_id' => $id]);
        $query = $this->db->get();
        return $result=$query->result();
    }

    // tabel beasiswa
    public function getBeasiswa()
    {
        $this->db->select("*");
        $this->db->from('beasiswa');  
        $this->db->where(['status_pemilihan'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->row();
    }
}
