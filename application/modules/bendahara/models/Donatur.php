<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Donatur extends CI_Model
{
    private $_table = "donatur";

    public $inisial;
    public $nama;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save($data)
    {
        $this->inisial = $data['inisial'];
        $this->nama = $data['nama'];

        return $this->db->update($this->_table, $this,array('inisial' => $data['inisial']));
    }

    public function deleteAll(){
        $this->db->empty_table($this->_table);
    }

    public function delete($inisial)
    {
        return $this->db->delete($this->_table, array("inisial" => $inisial));
	}
}
