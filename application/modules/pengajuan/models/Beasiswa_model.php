<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa_model extends CI_Model
{
    private $_table = "beasiswa";

    public $beasiswa_id;
    public $nama;
    public $tahun;
    public $periode;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $kuota_beasiswa;
    public $kuota_vote;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
            
            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required'],

            ['field' => 'periode',
            'label' => 'Periode',
            'rules' => 'required'],

            ['field' => 'tanggal_mulai',
            'label' => 'Tanggal_mulai',
            'rules' => 'required'],

            ['field' => 'tanggal_selesai',
            'label' => 'Tanggal_selesai',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["beasiswa_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->beasiswa_id = uniqid();
        $this->nama = $post["nama"];
        $this->tahun = $post["tahun"];
        $this->periode = $post["periode"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->kuota_beasiswa = $post["kuota_beasiswa"];
        $this->kuota_vote = $post["kuota_vote"];
        $this->status = $post["status"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->beasiswa_id = $post["id"];
        $this->nama = $post["nama"];
        $this->tahun = $post["tahun"];
        $this->periode = $post["periode"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->kuota_beasiswa = $post["kuota_beasiswa"];
        $this->kuota_vote = $post["kuota_vote"];
        $this->status = $post["status"];
        $this->db->update($this->_table, $this, array('beasiswa_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("beasiswa_id" => $id));
	}
}
