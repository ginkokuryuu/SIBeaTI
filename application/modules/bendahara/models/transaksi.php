<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model
{
    private $_table = "transaksi";

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
    public $inisial_donatur;

    public function getAll()
    {
        $this->db->select('transaksi.*, jenis_transaksi.nama as jenis_transaksi, kategori.nama as kategori, akun.nama as akun');
        $this->db->from($this->_table);
        $this->db->join('jenis_transaksi', 'jenis_transaksi.id = id_jenistransaksi', 'inner');
        $this->db->join('kategori', 'kategori.id = id_kategori', 'inner');
        $this->db->join('akun', 'akun.id = id_akun', 'inner');
        $this->db->order_by('periode', 'DESC');
        $this->db->order_by('akun', 'ASC');
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function saveFromTemp($data){
        $this->deskripsi = $data->deskripsi;
        $this->debit = $data->debit;
        $this->kredit = $data->kredit;
        $this->saldo = $data->saldo;
        $this->periode = $data->periode;
        $this->tanggal = date("Y-m-d", strtotime($data->tanggal));
        $this->id_jenistransaksi = $data->id_jenistransaksi;
        $this->id_kategori = $data->id_kategori;
        $this->id_akun = $data->id_akun;
        $this->inisial_donatur = $data->inisial_donatur;

        $this->updateDonatur($this->inisial_donatur);
        $this->updatePeriode($this->periode);

        $this->db->insert($this->_table, $this);
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
        $this->saldo = $this->kredit - $this->debit;
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
        $this->id = $data['id'];
        $this->deskripsi = $data['deskripsi'];
        $this->debit = $data['debit'];
        $this->kredit = $data['kredit'];
        $this->saldo = $this->kredit - $this->debit;
        $this->periode = $data['periode'];
        $this->tanggal = date("Y-m-d", strtotime($data['tanggal']));
        if($this->saldo >=0){
            $this->id_jenistransaksi = 1;
        }
        else{
            $this->id_jenistransaksi = 2;
        }
        $this->id_kategori = $data['kategori'];
        $this->id_akun = $data['akun'];
        $this->inisial_donatur = $data['inisial_donatur'];

        $this->updateDonatur($this->inisial_donatur);
        $this->updatePeriode($this->periode);

        return $this->db->update($this->_table, $this,array('id' => $data['id']));
    }

    public function split($data){
        $this->deskripsi = $data['deskripsi'];
        $this->debit = $data['debit'];
        $this->kredit = $data['kredit'];
        $this->id_kategori = $data['kategori'];
        $this->id_akun = $data['akun'];
        $this->periode = $data['periode'];
        $this->tanggal = date("Y-m-d", strtotime($data['tanggal']));
        $this->inisial_donatur = $data['inisial_donatur'];

        $this->saldo = $this->kredit - $this->debit;
        if($this->saldo >=0){
            $this->id_jenistransaksi = 1;
        }
        else{
            $this->id_jenistransaksi = 2;
        }

        $this->db->insert($this->_table, $this);
    }

    public function createBalance($data){
        $this->deskripsi = 'Penyeimbang akun untuk transfer';
        $this->debit = $data['kredit'];
        $this->kredit = $data['debit'];
        $this->id_kategori = $data['kategori'];
        $this->id_akun = $data['akun'];
        $this->periode = $data['periode'];
        $this->tanggal = date("Y-m-d", strtotime($data['tanggal']));
        $this->inisial_donatur = $data['inisial_donatur'];

        $this->updateDonatur($this->inisial_donatur);
        $this->updatePeriode($this->periode);

        $this->saldo = $this->kredit - $this->debit;
        if($this->saldo >=0){
            $this->id_jenistransaksi = 1;
        }
        else{
            $this->id_jenistransaksi = 2;
        }

        $this->db->insert($this->_table, $this);
    }

    public function transfer($data){
        $this->deskripsi = $data['deskripsi'];
        $this->debit = $data['debit'];
        $this->kredit = $data['kredit'];
        $this->id_kategori = $data['kategori'];
        $this->id_akun = $data['akun_tujuan'];
        $this->periode = $data['periode'];
        $this->tanggal = date("Y-m-d", strtotime($data['tanggal']));
        $this->inisial_donatur = $data['inisial_donatur'];

        $this->updateDonatur($this->inisial_donatur);
        $this->updatePeriode($this->periode);

        $this->saldo = $this->kredit - $this->debit;
        if($this->saldo >=0){
            $this->id_jenistransaksi = 1;
        }
        else{
            $this->id_jenistransaksi = 2;
        }

        $this->db->insert($this->_table, $this);
    }

    public function deleteAll(){
        $this->db->empty_table($this->_table);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    public function getPeriode(){
        return $this->db->query('select distinct periode as id, nama, periode.deskripsi as deskripsi from transaksi left join periode ON transaksi.periode=periode.id')->result();
    }

    public function getDonatur(){
        return $this->db
        ->query('select inisial_donatur as donatur, periode from transaksi where id_kategori=1 and saldo>0')
        ->result();
        
    }
    public function getByPeriode($data)
    {
        $this->db->select('transaksi.*, jenis_transaksi.nama as jenis_transaksi, kategori.nama as kategori, akun.nama as akun');
        $this->db->from($this->_table);
        $this->db->join('jenis_transaksi', 'jenis_transaksi.id = id_jenistransaksi', 'inner');
        $this->db->join('kategori', 'kategori.id = id_kategori', 'inner');
        $this->db->join('akun', 'akun.id = id_akun', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function getAllSaldo()
    {
        return $this->db->query("Select distinct 
        periode, 
       IFNULL((select sum(saldo) from transaksi b where b.periode=a.periode and b.id_jenistransaksi=1),0) as penerimaan,
       IFNULL((select sum(saldo) from transaksi b where b.periode=a.periode and b.id_jenistransaksi=2),0) as pengeluaran,
       IFNULL((select sum(saldo) from transaksi b where b.periode<a.periode),0) as periodeSebelum, 
       IFNULL((select sum(saldo) from transaksi b where b.periode<=a.periode),0) as saldo
       from transaksi a")->result();
    }
    public function getTotalAkun()
    {
        return $this->db->query("Select 
        akun.nama as nama, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and id_jenistransaksi='1'),0) as penerimaan_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun),0) as saldo_tahun
        from transaksi x LEFT JOIN akun ON x.id_akun = akun.id
        GROUP BY id_akun")->result();
    }
    public function getPeriodeTahunan()
    {
        return $this->db->query("select 
		akun.nama as nama,
        substring(periode,1,4) as periode_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and substring(y.periode,1,4)=substring(x.periode,1,4) and id_jenistransaksi='1'),0) as penerimaan_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and substring(y.periode,1,4)=substring(x.periode,1,4) and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and substring(y.periode,1,4)=substring(x.periode,1,4)),0) as saldo_tahun
        from transaksi x LEFT JOIN akun
ON x.id_akun = akun.id
        group by id_akun, substring(periode,1,4)")->result();
    }
    public function getPeriodeTahunBulan()
    {
        return $this->db->query("select distinct 
        akun.nama as nama,
        substring(periode,1,4) as periode_tahun,
        periode.nama as nama_bulan,
        periode,
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='1'),0) as penerimaan_tahun, 
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode),0) as saldo_tahun
        from transaksi x left join akun on x.id_akun=akun.id left join periode on periode.id=x.periode")->result();
    }
    public function getPeriodeTahunDetail()
    {
        return $this->db->query("select distinct 
        akun.nama as nama,
        kategori.nama as kategori,
        substring(periode,1,4) as periode_tahun,
        periode,
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='1' and x.id_kategori=y.id_kategori),0) as penerimaan_tahun, 
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='2' and x.id_kategori=y.id_kategori),0) as pengeluaran_tahun, 
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and x.id_kategori=y.id_kategori),0) as saldo_tahun
        from transaksi x left join akun on x.id_akun=akun.id left join kategori on x.id_kategori=kategori.id")->result();
    }
    public function getTotal()
    {
        return $this->db->query("Select 
        IFNULL((select sum(saldo) from transaksi where id_jenistransaksi='1'),0) as penerimaan_total, 
        IFNULL((select sum(saldo) from transaksi where id_jenistransaksi='2'),0) as pengeluaran_total, 
        IFNULL(sum(saldo),0) as saldo_total
        from transaksi")->result();
    }
    /*
    public function getPeriodeTahunanAkumulasi()
    {
        return $this->db->query("select 
		akun.nama,
        substring(periode,1,4) as periode_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and id_jenistransaksi='1'),0) as penerimaan_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4) and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where substring(y.periode,1,4)<=substring(x.periode,1,4)),0) as saldo_tahun
        from transaksi x LEFT JOIN akun
ON x.id_akun = akun.id
        group by id_akun, substring(periode,1,4)")->result();
    }
    */
    public function updateDonatur($donatur){
        if($donatur != ""){
            $sql = "INSERT INTO donatur (inisial)" .
                    " SELECT * FROM (SELECT ?) AS tmp" .
                    " WHERE NOT EXISTS (" .
                        "SELECT inisial FROM donatur WHERE inisial = ?" .
                    ") LIMIT 1;";
            
            $this->db->query($sql, [
                $donatur,
                $donatur
            ]);
        }
    }

    public function updatePeriode($periode){
        if($periode != ""){
            $sql = "INSERT INTO periode (id)" .
                    " SELECT * FROM (SELECT ?) AS tmp" .
                    " WHERE NOT EXISTS (" .
                        "SELECT id FROM periode WHERE id = ?" .
                    ") LIMIT 1;";
            
            $this->db->query($sql, [
                $periode,
                $periode
            ]);
        }
    }

    public function getPeriode(){
        return $this->db->query('select distinct periode as id, nama from transaksi left join periode ON transaksi.periode=periode.id')->result();
    }

    public function getDonatur(){
        return $this->db
        ->query('select inisial_donatur as donatur, periode from transaksi where id_kategori=1 and saldo>0')
        ->result();
        
    }
    public function getByPeriode($data)
    {
        $this->db->select('transaksi.*, jenis_transaksi.nama as jenis_transaksi, kategori.nama as kategori, akun.nama as akun');
        $this->db->from($this->_table);
        $this->db->join('jenis_transaksi', 'jenis_transaksi.id = id_jenistransaksi', 'inner');
        $this->db->join('kategori', 'kategori.id = id_kategori', 'inner');
        $this->db->join('akun', 'akun.id = id_akun', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function getAllSaldo()
    {
        return $this->db->query("Select distinct 
        periode, 
            IFNULL((select sum(saldo) from transaksi b where b.periode=a.periode and b.id_jenistransaksi=1),0) as penerimaan,
            IFNULL((select sum(saldo) from transaksi b where b.periode=a.periode and b.id_jenistransaksi=2),0) as pengeluaran,
            IFNULL((select sum(saldo) from transaksi b where b.periode<a.periode),0) as periodeSebelum, 
            IFNULL((select sum(saldo) from transaksi b where b.periode<=a.periode),0) as saldo
        from transaksi a")->result();
    }
    public function getTotalAkun()
    {
        return $this->db->query("Select 
        akun.nama as nama, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and id_jenistransaksi='1'),0) as penerimaan_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
        IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun),0) as saldo_tahun
        from transaksi x LEFT JOIN akun ON x.id_akun = akun.id
        GROUP BY id_akun")->result();
    }
    public function getPeriodeTahunan()
    {
        return $this->db->query("select 
		akun.nama as nama,
        substring(periode,1,4) as periode_tahun, 
            IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and substring(y.periode,1,4)=substring(x.periode,1,4) and id_jenistransaksi='1'),0) as penerimaan_tahun, 
            IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and substring(y.periode,1,4)=substring(x.periode,1,4) and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
            IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and substring(y.periode,1,4)=substring(x.periode,1,4)),0) as saldo_tahun
        from transaksi x LEFT JOIN akun
        ON x.id_akun = akun.id
        group by id_akun, substring(periode,1,4)")->result();
    }
    public function getPeriodeTahunBulan()
    {
        return $this->db->query("select distinct 
        akun.nama as nama,
        substring(periode,1,4) as periode_tahun,
        periode.nama as nama_bulan,
        periode,
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='1'),0) as penerimaan_tahun, 
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='2'),0) as pengeluaran_tahun, 
                IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode),0) as saldo_tahun
        from transaksi x left join akun on x.id_akun=akun.id left join periode on periode.id=x.periode")->result();
    }
    public function getPeriodeTahunDetail()
    {
        return $this->db->query("select distinct 
        akun.nama as nama,
        kategori.nama as kategori,
        substring(periode,1,4) as periode_tahun,
        periode,
            IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='1' and x.id_kategori=y.id_kategori),0) as penerimaan_tahun, 
            IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and id_jenistransaksi='2' and x.id_kategori=y.id_kategori),0) as pengeluaran_tahun, 
            IFNULL((select sum(y.saldo) from transaksi y where x.id_akun=y.id_akun and x.periode=y.periode and x.id_kategori=y.id_kategori),0) as saldo_tahun
        from transaksi x left join akun on x.id_akun=akun.id left join kategori on x.id_kategori=kategori.id")->result();
    }
    public function getTotal()
    {
        return $this->db->query("Select 
            IFNULL((select sum(saldo) from transaksi where id_jenistransaksi='1'),0) as penerimaan_total, 
            IFNULL((select sum(saldo) from transaksi where id_jenistransaksi='2'),0) as pengeluaran_total, 
            IFNULL(sum(saldo),0) as saldo_total
        from transaksi")->result();
    }
}
