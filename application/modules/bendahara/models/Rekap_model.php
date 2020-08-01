<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_model extends CI_Model
{
    public function getActivePeriode(){
        $sql = "select id from periode where status = 1 limit 1;";

        return $this->db->query($sql)->row();
    }

    public function getAllPeriodeBeforeActive($active){
        $sql = "select id from periode where substring(id,1,4)=substring(?,1,4) and id < ? order by id asc;";

        return $this->db->query($sql, [$active, $active])->result();
    }

    public function getPeriodikPertahun($activePeriode){
        $sql = "select 
        substring(periode,1,4) as periode_tahun, 
        IFNULL((select count(y.id) from transaksi y where substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as jumlah_donasi,
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as nominal_donasi,
        IFNULL((select count(y.id) from transaksi y where substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as jumlah_penerima,
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as nominal_penyaluran,
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_kategori='3'), 0) as lain_lain
        from transaksi x
        where substring(x.periode,1,4)<substring(?,1,4)
        group by substring(periode, 1, 4);";

        return $this->db->query($sql,[$activePeriode])->result();
    }

    public function getKumulatifPertahun($activePeriode){
        $sql = "select 
        substring(periode,1,4) as periode_tahun, 
        IFNULL((select count(y.id) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as jumlah_donasi,
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as nominal_donasi,
        IFNULL((select count(y.id) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as jumlah_penerima,
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as nominal_penyaluran,
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and y.id_kategori='3'), 0) as lain_lain
        from transaksi x
        where substring(x.periode,1,4)<substring(?,1,4)
        group by substring(periode, 1, 4);";

        return $this->db->query($sql,[$activePeriode])->result();
    }

    public function getActiveKumulatifTahun($activePeriode){
        $sql = "select
        periode,
        IFNULL((select count(y.id) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as jumlah_donasi,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as nominal_donasi,
        IFNULL((select count(y.id) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as jumlah_penerima,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as nominal_penyaluran,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and y.id_kategori='3'), 0) as lain_lain
        from transaksi x
        where x.periode=?
        group by periode;";

        return $this->db->query($sql,[$activePeriode])->result();
    }

    public function getActivePeriodikTahun($activePeriode){
        $sql = "select
        periode,
        substring(periode,1,4) as periode_pertahun,
        IFNULL((select count(y.id) from transaksi y where y.periode<=x.periode and substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as jumlah_donasi,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as nominal_donasi,
        IFNULL((select count(y.id) from transaksi y where y.periode<=x.periode and substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as jumlah_penerima,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as nominal_penyaluran,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and substring(y.periode,1,4)=substring(x.periode,1,4) and y.id_kategori='3'), 0) as lain_lain
        from transaksi x
        where x.periode<=?
        group by periode
        order by periode DESC
        limit 1;";

        return $this->db->query($sql,[$activePeriode])->result();
    }

    public function getPeriodikPeriode($activePeriode){
        $sql = "select
        periode, periode.nama as nama_periode,
        IFNULL((select count(y.id) from transaksi y where y.periode=x.periode and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as jumlah_donasi,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode=x.periode and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as nominal_donasi,
        IFNULL((select count(y.id) from transaksi y where y.periode=x.periode and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as jumlah_penerima,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode=x.periode and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as nominal_penyaluran,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode=x.periode and y.id_kategori='3'), 0) as lain_lain
        from transaksi x
        left join periode on periode.id = x.periode
        where substring(x.periode,1,4)=substring(?,1,4) and x.periode<=?
        group by periode;";

        return $this->db->query($sql,[$activePeriode, $activePeriode])->result();
    }

    public function getKumulatifPeriode($activePeriode){
        $sql = "select
        periode,
        IFNULL((select count(y.id) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as jumlah_donasi,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='1' and y.id_kategori='1' and y.id_akun='2'), 0) as nominal_donasi,
        IFNULL((select count(y.id) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as jumlah_penerima,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and y.id_jenistransaksi='2' and y.id_kategori='4' and y.id_akun='2'), 0) as nominal_penyaluran,
        IFNULL((select sum(y.saldo) from transaksi y where y.periode<=x.periode and y.id_kategori='3'), 0) as lain_lain
        from transaksi x
        where substring(x.periode,1,4)=substring(?,1,4) and x.periode<=?
        group by periode;";

        return $this->db->query($sql,[$activePeriode, $activePeriode])->result();
    }

    public function getKeteranganPeriodik($activePeriode){
        $sql = "select id, 
        IFNULL((select deskripsi from periode y where y.id=x.id), '-') as deskripsi
        from periode x
        where substring(x.id,1,4)=substring(?,1,4) and x.id<=?;";
        
        return $this->db->query($sql,[$activePeriode, $activePeriode])->result();
    }
}
