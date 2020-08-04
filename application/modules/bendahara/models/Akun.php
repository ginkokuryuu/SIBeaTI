<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model
{
    private $_table = "akun";

    public $id;
    public $nama;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function create($nama)
    {
        $sql = "INSERT INTO akun (nama)" .
                " SELECT * FROM (SELECT ?) AS tmp" .
                " WHERE NOT EXISTS (" .
                    "SELECT nama FROM akun WHERE nama = ?" .
                ") LIMIT 1;";

        $this->db->query($sql, [
            $nama,
            $nama
        ]);
    }

    public function deleteAll(){
        $this->db->delete($this->_table);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}
}
