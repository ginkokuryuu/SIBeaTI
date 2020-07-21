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
        $this->db->select('temp_transaksi.*, jenis_transaksi.nama as jenis_transaksi, kategori.nama as kategori, akun.nama as akun');
        $this->db->from($this->_table);
        $this->db->join('jenis_transaksi', 'jenis_transaksi.id = id_jenistransaksi', 'inner');
        $this->db->join('kategori', 'kategori.id = id_kategori', 'inner');
        $this->db->join('akun', 'akun.id = id_akun', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function getAkun(){
        $this->db->select('*');
        $this->db->from('akun');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJenisTrans(){
        $this->db->select('*');
        $this->db->from('jenis_transaksi');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKategori(){
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result();
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

    public function save($data){
        $this->deskripsi = $data['deskripsi'];
        $this->debit = $data['debit'];
        $this->kredit = $data['kredit'];
        $this->saldo = $this->debit - $this->kredit;
        $this->periode = $data['periode'];
        $this->tanggal = date("Y-m-d", strtotime($data['tanggal']));
        $this->id_jenistransaksi = $data['jenis_trans'];
        $this->id_kategori = $data['kategori'];
        $this->id_akun = $data['akun'];

        return $this->db->update($this->_table, $this,array('id' => $data['id']));
    }

    public function deleteAll(){
        $this->db->delete($this->_table);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}
}
