<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima_model extends CI_Model
{
    private $_table = "penerima";

    public $penerima_id;
    public $calon_id;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    // data penerima berdasarkan beasiswa id
    public function getById($id)
    {
        $this->db->select('nrp, nama_lengkap, nama_bank, no_rekening, nama_rekening, penerima_id, biodata.biodata_id');
        $this->db->from('penerima');
        $this->db->join('calon', 'calon.calon_id = penerima.calon_id');
        $this->db->join('pendaftar', 'pendaftar.pendaftar_id = calon.pendaftar_id'); 
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['beasiswa.beasiswa_id'=>$id]);
        $query = $this->db->get();
        return $query->result();
    }

    //cek apakah yang dipilih sudah ada di database
    public function selection_exists($calonid)
    {
        $this->db->where(['calon_id'=>$calonid]);
        $query = $this->db->get('penerima');
        if ($query->num_rows() > 0){
            return 1;
        }
        else{
            return 0;
        }
    }

    //insert ke tabel penerima
    public function save_penerima($calonid)
    {
        $this->calon_id = $calonid;
        $status = $this->selection_exists($calonid); 
        if( $status == 0)
        {
            return $this->db->insert($this->_table, $this);
        }
        else
        {
            echo "<script>
            alert('Maaf terdapat peserta yang sama dengan pemilihan sebelumnya');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }
}