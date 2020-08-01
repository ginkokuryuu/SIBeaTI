<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan_model extends CI_Model
{
    private $_table = "perencanaan";

    public $id;
    public $status = 'rencana';
    public $untuk_periode;
    public $nominal_penyaluran;
    public $jumlah_penerima;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function create($data)
    {
        $sql = "INSERT INTO perencanaan (untuk_periode, nominal_penyaluran, jumlah_penerima)
                VALUES (?, ?, ?);";

        $this->db->query($sql, [
            $data['untuk_periode'],
            $data['nominal_penyaluran'],
            $data['jumlah_penerima']
        ]);
    }

    public function save($data){
        $this->id = $data['id'];
        $this->status = $data['status'];
        $this->untuk_periode = $data['untuk_periode'];
        $this->nominal_penyaluran = $data['nominal_penyaluran'];
        $this->jumlah_penerima = $data['jumlah_penerima'];

        $this->db->update($this->_table, $this, array('id' => $this->id));
    }

    public function getSaldo($activePeriode){
        $sql = 'SELECT sum(saldo) as saldo_berjalan FROM `transaksi` WHERE periode<=?;';

        return $this->db->query($sql,[$activePeriode])->result();
    }

    public function deleteStatus($status){
        $this->db->delete($this->_table, array('status' => $status));
    }

    public function deleteAll(){
        $this->db->empty_table($this->_table);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}
}
