<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima extends CI_Model
{
    private $_table = "beasiswa";

    public function getAll()
    {
        return $this->db->query('select distinct
        concat(DATE_FORMAT(beasiswa.tanggal_mulai,"%e/%m/%Y"),DATE_FORMAT(beasiswa.tanggal_selesai," - %e/%m/%Y")) as periode_range, 
        biodata.no_rekening as norek,
        biodata.nama_lengkap as nama 
        from beasiswa
        right join pendaftar on pendaftar.beasiswa_id = beasiswa.beasiswa_id
        left join biodata on biodata.biodata_id = pendaftar.biodata_id
        left join calon on pendaftar.pendaftar_id = calon.pendaftar_id
        left join penerima on penerima.calon_id = calon.calon_id')->result();
    }

    public function getPeriode()
    {
        return $this->db->query('select distinct
        concat(DATE_FORMAT(beasiswa.tanggal_mulai,"%e/%m/%Y"),DATE_FORMAT(beasiswa.tanggal_selesai," - %e/%m/%Y")) as periode_range 
        from beasiswa')->result();
    }
    public function getNameByPeriode($periode)
    {
        return $this->db->query('select distinct
        concat(DATE_FORMAT(beasiswa.tanggal_mulai,"%e/%m/%Y"),DATE_FORMAT(beasiswa.tanggal_selesai," - %e/%m/%Y")) as periode_range, 
        biodata.no_rekening as norek,
        biodata.nama_lengkap as nama 
        from beasiswa
        right join pendaftar on pendaftar.beasiswa_id = beasiswa.beasiswa_id
        left join biodata on biodata.biodata_id = pendaftar.biodata_id
        left join calon on pendaftar.pendaftar_id = calon.pendaftar_id
        left join penerima on penerima.calon_id = calon.calon_id
        where concat(DATE_FORMAT(beasiswa.tanggal_mulai,"%e/%m/%Y"),DATE_FORMAT(beasiswa.tanggal_selesai," - %e/%m/%Y"))="'.$periode.'"' )->result();
    }
}
