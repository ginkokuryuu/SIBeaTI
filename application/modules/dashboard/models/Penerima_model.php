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
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["penerima_id" => $id])->result();
    }

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

    // mendapatkan kuota beasiswa
    public function getKuota()
    {
        $this->db->select('kuota_beasiswa');
        $this->db->from('beasiswa');  
        $this->db->where(['status'=>'Dibuka']);
        $query = $this->db->get();
        return $result=$query->row();
    }
}
