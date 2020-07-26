<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_model extends CI_Model
{
    private $_table = "calon";

    public $calon_id;
    public $user_id;
    public $pendaftar_id;

    // get All (tim seleksi)
    public function getAll()
    {
        $this->db->select('biodata.biodata_id, biodata.nrp, biodata.nama_lengkap, biodata.penghasilan_ortu, biodata.ukt, biodata.ipk, calon.calon_id');
        $this->db->from('calon');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->group_by('pendaftar.pendaftar_id');
        $query = $this->db->get();
        return $query->result();
    }

    // data yang sama cuma diambil satu (karena untuk filter) (tim seleksi)
    public function getDistinct(){
        $this->db->distinct();
        $this->db->select('beasiswa.tahun, beasiswa.periode');
        $this->db->from('calon');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    // query where sesuai input tahun dan periode (tim seleksi)
    public function getWhere($tahun, $periode)
    {
        $this->db->select('count(calon.calon_id) as jumlah, calon.calon_id, biodata.biodata_id, biodata.nrp, biodata.nama_lengkap, biodata.penghasilan_ortu, biodata.ukt, biodata.ipk, calon.calon_id, beasiswa.status');
        $this->db->from('calon');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->group_by('pendaftar.pendaftar_id');
        $this->db->where(['beasiswa.tahun'=>$tahun, 'beasiswa.periode'=>$periode]);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["calon_id" => $id])->result();
    }

    //cek apakah yang divote sama (voter)
    public function voting_exists($pendaftarid)
    {
        $userid = $this->session->userdata('user_id');
        $this->db->where(['pendaftar_id'=>$pendaftarid, 'user_id'=>$userid]);
        $query = $this->db->get('calon');
        if ($query->num_rows() > 0){
            return 1;
        }
        else{
            return 0;
        }
    }

    //insert ke tabel calon (voter)
    public function save_calon($pendaftarid)
    {
        $this->user_id = $this->session->userdata('user_id');
        $this->pendaftar_id = $pendaftarid;
        $status = $this->voting_exists($pendaftarid); 
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

    // tabel penerima (tim seleksi)
    public function getPenerima()
    {
        $this->db->select('penerima_id, calon_id');
        $this->db->from('penerima');  
        $query = $this->db->get();
        return $result=$query->result();
    }

    // hitung jumlah yang sudah dipilih (tim seleksi)
    public function countSelection()
    {
        $this->db->select('penerima.penerima_id, penerima.calon_id');
        $this->db->from('penerima'); 
        $this->db->join('calon', 'calon.calon_id = penerima.calon_id');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id'); 
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->result();
    }

    // tabel beasiswa (tim seleksi)
    public function getBeasiswa()
    {
        $this->db->select("*");
        $this->db->from('beasiswa');  
        $this->db->where(['status'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->row();
    }

    // mendapatkan kuota vote
    public function getKuota()
    {
        $this->db->select('kuota_vote');
        $this->db->from('beasiswa');  
        $this->db->where(['status'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->row();
    }

    // hitung jumlah vote (tim seleksi)
    public function numberVote()
    {
        $this->db->select('count(calon.calon_id');
        $this->db->from('calon');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id'); 
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.status'=>'Dibuka']);
        $this->db->group_by('calon.user_id');
        $query = $this->db->get();
        return $result=$query->result();
    }
}
