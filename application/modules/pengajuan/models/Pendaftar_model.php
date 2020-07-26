<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $beasiswa_id;
    public $biodata_id;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["biodata_id" => $id])->result();
    }

    public function pendaftar_exists($beasiswaid, $biodataid)
    {
        $this->db->where(['beasiswa_id'=>$beasiswaid, 'biodata_id'=>$biodataid]);
        $query = $this->db->get('pendaftar');
        if ($query->num_rows() > 0){
            return 1;
        }
        else{
            return 0;
        }
    }

    //insert ke tabel pendaftar
    public function save_pendaftar($beasiswaid, $biodataid)
    {
        $this->beasiswa_id = $beasiswaid;
        $this->biodata_id = $biodataid;
        $status = $this->pendaftar_exists($beasiswaid, $biodataid); 
        if( $status == 0)
        {
            return $this->db->insert($this->_table, $this);
        }
        else
        {
            echo "<script>
            alert('Maaf Anda sudah terdaftar sebelumnya');
            window.location='".site_url('pengajuan/periode')."';
            </script>";
        }
    }
}
