<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    private $_table = "berita";

    public $berita_id;
    public $judul;
    public $isi_berita;
    public $tanggal_berita;

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],
            
            ['field' => 'isi_berita',
            'label' => 'Isi_berita',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["berita_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->berita_id = uniqid();
        $this->judul = $post["name"];
		$this->isi_berita = $post["price"];
		$this->tanggal_berita = date('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->berita_id = $post["id"];
        $this->judul = $post["judul"];
        $this->isi_berita = $post["isi_berita"];
        $this->tanggal_berita = date('Y-m-d H:i:s');
        $this->db->update($this->_table, $this, array('berita_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("berita_id" => $id));
	}
}
