<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model
{
    private $_table = "biodata";
    protected $ci;

    public $biodata_id;
    public $user_id;
    public $nama_lengkap;
    public $foto;
    public $nama_panggilan;
    public $angkatan;
    public $semester;
    public $nrp;
    public $ktp;
    public $ukt;
    public $ipk;
    public $no_telepon;
    public $asal_sma;
    public $nama_bank;
    public $nama_rekening;
    public $no_rekening;
    public $beasiswa_lain;
    public $nama_beasiswa;
    public $nilai_beasiswa;
    public $telepon_ortu;
    public $pekerjaan_ortu;
    public $penghasilan_ortu;
    public $link_google_map;
    public $status_rumah;
    public $foto_rumah;
    public $kegiatan_selain_kuliah;
    public $organisasi;
    public $kehidupan_sehari_hari;
    public $cerita_keluarga;
    public $dampak_covid;
    public $capaian_ke_depan;
    public $ketika_menjadi_alumni;
    public $bersedia_kegiatan_alumni;

    public function rules()
    {
        return [
            ['field' => 'nama_lengkap',
            'label' => 'Nama_Lengkap',
            'rules' => 'required'],
            
            ['field' => 'nama_panggilan',
            'label' => 'Nama_Panggilan',
            'rules' => 'required']
        ];
    }

    /*     
    Pengguna baru awalnya gapunya biodata. Pas dia buka biodata, auto kebikin biodata di tabel biodata
    Kenapa bikin biodata duluan? biar pas fungsi save dia cukup update field yg sebelumnya NULL
     */
    public function getById($id)
    {   
        $query = $this->db->get_where($this->_table, ["user_id" => $id])->row();
        if(empty($query))   // user's biodata not exist
        {
            // create biodata
            $this->user_id = $id;
            $this->db->insert($this->_table, $this);
        }
        return $query;
    }

    public function save_foto($id, $username)
    {
        $post = $this->input->post();
        if ($_FILES["foto"]["name"]) {      // ada pasfoto yg di upload user
            $this->foto = $this->_uploadImage($username);
        } else {
            $this->foto = $post["old_image"];
        }
        $foto = array('foto' => $this->foto);
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $foto);
        return true;
    }

    public function save_pribadi($id, $data)
    {
        $data = array(  'nama_lengkap' => $data["nama_lengkap"],
                        'nama_panggilan' => $data["nama_panggilan"],
                        'angkatan' => $data["angkatan"],
                        'semester' => $data["semester"],
                        'nrp' => $data["nrp"],
                        'ktp' => $data["ktp"],
                        'ukt' => $data["ukt"],
                        'ipk' => $data["ipk"],
                        'no_telepon' => $data["no_telepon"],
                        'asal_sma' => $data["asal_sma"], 
                        'nama_bank' => $data["nama_bank"], 
                        'nama_rekening' => $data["nama_rekening"],
                        'no_rekening' => $data["no_rekening"],
                        'beasiswa_lain' => $data["beasiswa_lain"],
                        'nama_beasiswa' => $data["nama_beasiswa"],
                        'nilai_beasiswa' => $data["nilai_beasiswa"]
                        );
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $data);
        return true;
    }

    public function save_ortu($id, $data)
    {
        $data = array(  'telepon_ortu' => $data["telepon_ortu"],
                        'pekerjaan_ortu' => $data["pekerjaan_ortu"],
                        'penghasilan_ortu' => $data["penghasilan_ortu"],
                        );
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $data);
        return true;
    }

    public function save_rumah($id, $username, $data)
    {
        if ($_FILES["foto_rumah"]["name"]) {        // ada foto rumah yg di upload user
            $this->foto_rumah = $this->_uploadImage2($username);
        } else {
            $this->foto_rumah = $data["old_image2"];
        }
        $data = array(  'link_google_map' => $data["link_google_map"],
                        'status_rumah' => $data["status_rumah"],
                        'foto_rumah' => $this->foto_rumah,
                        );
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $data);
        return true;
    }

    public function save_cerita($id, $data)
    {
        $data = array(  'kegiatan_selain_kuliah' => $data["kegiatan_selain_kuliah"],
                        'organisasi' => $data["organisasi"],
                        'kehidupan_sehari_hari' => $data["kehidupan_sehari_hari"],
                        'cerita_keluarga' => $data["cerita_keluarga"],
                        'dampak_covid' => $data["dampak_covid"],
                        'capaian_ke_depan' => $data["capaian_ke_depan"],
                        'bersedia_kegiatan_alumni' => $data["bersedia_kegiatan_alumni"],
                        'ketika_menjadi_alumni' => $data["ketika_menjadi_alumni"],
                        );
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $data);
        return true;
    }
    
    // upload image buat pasfoto
    private function _uploadImage($username)
	{
		$config['upload_path']          = './images/foto/';
        	$config['allowed_types']        = 'jpeg|jpg|png';
        	$config['file_name']            = 'foto_'.$username;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }
    
    // upload image buat foto rumah
    private function _uploadImage2($username)
	{
		$config['upload_path']          = './images/rumah/';
        	$config['allowed_types']        = 'jpeg|jpg|png';
        	$config['file_name']            = 'rumah_'.$username;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_rumah')) {
			return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    // cek biodata sudah lengkap atau belum
    public function isNotNull($id){
        $biodata = array(   "user_id" => $id,
                            'foto !=' => NULL,
                            'nama_lengkap !=' => NULL,
                            'nama_panggilan !=' => NULL,
                            'angkatan !=' => NULL,
                            'semester !=' => NULL,
                            'nrp !=' => NULL,
                            'ktp !=' => NULL,
                            'ukt !=' => NULL,
                            'ipk !=' => NULL,
                            'no_telepon !=' => NULL,
                            'asal_sma !=' => NULL, 
                            'nama_bank !=' => NULL, 
                            'nama_rekening !=' => NULL,
                            'no_rekening !=' => NULL,
                            'beasiswa_lain !=' => NULL,
                            'telepon_ortu !=' => NULL,
                            'pekerjaan_ortu !=' => NULL,
                            'penghasilan_ortu !=' => NULL,
                            'link_google_map !=' => NULL,
                            'status_rumah !=' => NULL,
                            'foto_rumah !=' => NULL,
                            'kegiatan_selain_kuliah !=' => NULL,
                            'organisasi !=' => NULL,
                            'kehidupan_sehari_hari !=' => NULL,
                            'cerita_keluarga !=' => NULL,
                            'dampak_covid !=' => NULL,
                            'capaian_ke_depan !=' => NULL,
                            'bersedia_kegiatan_alumni !=' => NULL,
                            'ketika_menjadi_alumni !=' => NULL,
                            );

        $data = $this->db->get_where($this->_table, $biodata)->row();
        if ($data){
            return $data;
        }
        else {
            return false;
        }
    }
}
