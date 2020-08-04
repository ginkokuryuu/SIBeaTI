<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    private $_table = "berita";

    public $berita_id;
    public $judul;
    public $isi_berita;
    public $tanggal_berita;
    public $attachment;

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
        $this->judul = $post["judul"];
		$this->isi_berita = $post["isi_berita"];
        $this->tanggal_berita = date('Y-m-d H:i:s');
        $filename = $_FILES["attachment"]["name"];
        if ($filename) {        // ada file yg di upload user
            $this->attachment = $this->_uploadFile($filename);
        } else {
            $this->attachment = null;
        }
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->berita_id = $post["id"];
        $this->judul = $post["judul"];
        $this->isi_berita = $post["isi_berita"];
        $this->tanggal_berita = date('Y-m-d H:i:s');
        $filename = $_FILES["attachment"]["name"];
        $old_attachment = $post["old_attachment"];
        if ($filename) {        // ada file yg di upload user
            $this->attachment = $this->_uploadFile($filename);
        } else {
            if ($old_attachment == "NULL"){
                $this->attachment = null;
            }
            else {
                $this->attachment = $post["old_attachment"];
            }
        }
        $this->db->update($this->_table, $this, array('berita_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete($this->_table, array("berita_id" => $id));
    }

    public function deleteAttachment($id)
    {
        $this->_deleteFile($id);
        $this->db->where('berita_id', $id);
        return $this->db->update($this->_table, ["attachment" => NULL]);
    }
    
    // upload file attachment berita
    private function _uploadFile($filename)
    {
        $config['allowed_types']        = '*';
        $config['upload_path']          = './uploads/berita/';
        $config["file_name"]            = $filename;
        $config['overwrite']			= true;
        $config['max_size']             = 51200; // 50MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('attachment')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    private function _deleteFile($id)
    {
        $berita = $this->getById($id);
        if ($berita->attachment) {
            $filename = explode(".", $berita->attachment)[0];
            return array_map('unlink', glob(FCPATH."uploads/berita/$filename.*"));
        }
    }
}