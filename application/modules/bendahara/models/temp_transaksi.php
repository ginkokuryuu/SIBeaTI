<?php defined('BASEPATH') OR exit('No direct script access allowed');

class temp_transaksi extends CI_Model
{
    private $_table = "temp_transaksi";

    public $id;
    public $deskripsi;
    public $debit;
    public $kredit;
    public $saldo;
    public $periode;
    public $tanggal;
    public $id_jenistransaksi;
    public $id_kategori;
    public $id_akun;

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
        $this->deskripsi = $data['Deskripsi'];
        $this->debit = $data['Debit'];
        $this->kredit = $data['Kredit'];
        $this->saldo = $this->debit - $this->kredit;
        $this->periode = $data['Periode'];
        $this->tanggal = date("Y-m-d", strtotime($data['Tanggal']));
        if($this->saldo >=0){
            $this->id_jenistransaksi = 1;
        }
        else{
            $this->id_jenistransaksi = 2;
        }
        $this->id_kategori = 3;
        $this->id_akun = 1;

        $this->db->insert($this->_table, $this);
    }

    public function deleteAll(){
        $this->db->delete($this->_table);
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
