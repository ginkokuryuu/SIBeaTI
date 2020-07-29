<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Model
{
    private $_table = "periode";

    public $id;
    public $nama;
    public $deskripsi;
    public $status;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save($data)
    {
        $this->id = $data['id'];
        $this->nama = $data['nama'];
        $this->deskripsi = $data['deskripsi'];
        $this->status = $data['status'];

        return $this->db->update($this->_table, $this,array('id' => $data['id']));
    }

    public function deleteAll(){
        $this->db->empty_table($this->_table);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}
}
