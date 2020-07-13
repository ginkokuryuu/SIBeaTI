<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $biodata_id;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pendaftar_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->pendaftar_id = uniqid();
        $this->biodata_id = $this->session->userdata('user_logged')->user_id;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->pendaftar_id = $post["id"];
        $this->biodata_id = $this->session->userdata('user_logged')->user_id;
        $this->db->update($this->_table, $this, array('pendaftar_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("pendaftar_id" => $id));
	}
}
