<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $beasiswa_id;
    public $biodata_id;

    public function getAll()
    {
        $this->db->select('tahun, periode, nrp, nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    // data yang sama cuma diambil satu (karena untuk filter)
    public function getDistinct(){
        $this->db->distinct();
        $this->db->select('tahun, periode');
        $this->db->from('pendaftar');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    // query where sesuai input tahun dan periode
    public function getWhere($tahun, $periode)
    {
        $this->db->select('nrp,nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id, biodata.biodata_id, users.username, beasiswa.status, beasiswa.beasiswa_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->join('users', 'users.user_id = biodata.user_id');
        $this->db->where(['tahun'=>$tahun, 'periode'=>$periode]);
        $query = $this->db->get();
        return $query->result();
    }

    // tabel calon
    public function getCalon()
    {
        $this->db->select('calon_id, user_id, pendaftar_id');
        $this->db->from('calon');  
        $query = $this->db->get();
        return $result=$query->result();
    }

    // hitung jumlah yang sudah divote
    public function countVote()
    {
        $this->db->select('calon.calon_id, calon.user_id, calon.pendaftar_id');
        $this->db->from('calon'); 
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id'); 
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->result();
    }

    // tabel beasiswa
    public function getBeasiswa()
    {
        $this->db->select("*");
        $this->db->from('beasiswa');  
        $this->db->where(['status'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->row();
    }
}
