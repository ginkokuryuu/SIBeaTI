<link href="<?php echo base_url('css/edit-transaksi.css') ?>" rel="stylesheet">

<?php $this->load->view('forms/editTrans'); ?>
<?php $this->load->view('forms/pecahTrans'); ?>
<?php $this->load->view('forms/transferTrans'); ?>

<?php
function changeNegNumber($number){
    if($number < 0){
        $number = abs($number);
        return "(" . $number . ")";
    }
    else{
        return $number;
    }
}
?>

<div style="margin-left:5%; margin-right:5%;">
    <div class="alert alert-primary" role="alert">
        Ingat, ini tidak akan disimpan ke database sebelum di simpan!
    </div>

    <div class='form-inline' style='margin-top: 2%; margin-bottoM: 2%;'>
        <h3>Simpan ke database</h3>
        <a href="<?= site_url('bendahara/edit/saveDatabase') ?>" class='btn btn-primary' style='margin-left: 1%;'>Save</a>
    </div>

    <div class='form-inline' style='margin-top: 2%; margin-bottoM: 2%;'>
        <h5>Hapus semua</h5>
        <a href="<?= site_url('bendahara/edit/deleteAll') ?>" class='btn btn-danger' style='margin-left: 1%;'>Hapus</a>
    </div>

    <table class="table table-light">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <?php foreach($keys as $key): ?>
            <th scope="col"><?php echo $key; ?></th>
        <?php endforeach; ?>
        <th scope='col'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 0;
        foreach($datas as $data): ?>
        <tr>
            <th scope="row"><?php echo $count + 1; ?></th>
            <td class='id' style='display: none;'><?php echo $data->id; ?></td>
            <td class='id_trans' style='display: none;'><?php echo $data->id_jenistransaksi; ?></td>
            <td class='id_akun' style='display: none;'><?php echo $data->id_akun; ?></td>
            <td class='id_kategori' style='display: none;'><?php echo $data->id_kategori; ?></td>
            <td class='tanggal'><?php echo $data->tanggal; ?></td>
            <td class='deskripsi'><?php echo $data->deskripsi; ?></td>
            <td class='debit'><?php echo $data->debit; ?></td>
            <td class='kredit'><?php echo $data->kredit; ?></td>
            <td class='saldo'><?php echo changeNegNumber($data->saldo); ?></td>
            <td class='periode'><?php echo $data->periode; ?></td>
            <td class='jenis_trans'><?php echo $data->jenis_transaksi; ?></td>
            <td class='akun'><?php echo $data->akun; ?></td>
            <td class='kategori'><?php echo $data->kategori; ?></td>
            <td class='inisial_donatur'><?php echo $data->inisial_donatur; ?></td>
            <td>
                <div>
                    <button class='btn btn-primary' id='edit' onclick='openEdit(<?php echo $count; ?>)'>Edit</button>
                    <a href='<?= site_url("bendahara/edit/delete/$data->id") ?>' class='btn btn-danger' id='delete' name='<?php echo $data->id; ?>'>Delete</a>
                    <button class='btn btn-secondary' id='pecah' onclick='openPecah(<?php echo $count; ?>)'>Pecah</button>
                    <button class='btn btn-secondary' id='transfer' onclick='openTransfer(<?php echo $count; ?>)'>Transfer</button>
                </div>
            </td>
        </tr>
        <?php $count++;
        endforeach;?>
    </tbody>
    </table>
</div>

<script>
    function openEdit(count){
        closePecah();
        closeTransfer();

        if(document.getElementById('ov-edit').style.display != 'block'){
            var id = this.document.getElementsByClassName('id');
            var id_trans = this.document.getElementsByClassName('id_trans');
            var id_akun = this.document.getElementsByClassName('id_akun');
            var id_kategori = this.document.getElementsByClassName('id_kategori');
            var tanggal = this.document.getElementsByClassName('tanggal');
            var deskripsi = this.document.getElementsByClassName('deskripsi');
            var debit = this.document.getElementsByClassName('debit');
            var kredit = this.document.getElementsByClassName('kredit');
            var periode = this.document.getElementsByClassName('periode');
            var inisial_donatur = this.document.getElementsByClassName('inisial_donatur');

            document.getElementById('tanggal').value = tanggal[count].innerHTML;
            document.getElementById('deskripsi').value = deskripsi[count].innerHTML;
            document.getElementById('debit').value = debit[count].innerHTML;
            document.getElementById('kredit').value = kredit[count].innerHTML;
            document.getElementById('periode').value = periode[count].innerHTML;
            document.getElementById('jenis_trans').value = id_trans[count].innerHTML;
            document.getElementById('akun').value = id_akun[count].innerHTML;
            document.getElementById('kategori').value = id_kategori[count].innerHTML;
            document.getElementById('inisial_donatur').value = inisial_donatur[count].innerHTML;

            document.getElementById('id').value = id[count].innerHTML;

            document.getElementById('ov-edit').style.display = 'block';
        }
    }

    function closeEdit(){
        document.getElementById('ov-edit').style.display = 'none';
    }

    function submitEditForm(){
        document.getElementById('edit-form').submit();
    }

    function openPecah(count){
        closeEdit();
        closeTransfer();

        if(document.getElementById('ov-pecah').style.display != 'block'){
            var id = this.document.getElementsByClassName('id');
            var id_trans = this.document.getElementsByClassName('id_trans');
            var id_akun = this.document.getElementsByClassName('id_akun');
            var id_kategori = this.document.getElementsByClassName('id_kategori');
            var tanggal = this.document.getElementsByClassName('tanggal');
            var deskripsi = this.document.getElementsByClassName('deskripsi');
            var debit = this.document.getElementsByClassName('debit');
            var kredit = this.document.getElementsByClassName('kredit');
            var periode = this.document.getElementsByClassName('periode');
            var inisial_donatur = this.document.getElementsByClassName('inisial_donatur');

            document.getElementById('pc-id').value = id[count].innerHTML;
            document.getElementById('pc-tanggal').value = tanggal[count].innerHTML;
            document.getElementById('pc-debit_awal').value = debit[count].innerHTML;
            document.getElementById('pc-kredit_awal').value = kredit[count].innerHTML;
            document.getElementById('pc-periode').value = periode[count].innerHTML;
            document.getElementById('pc-akun').value = id_akun[count].innerHTML;
            document.getElementById('pc-kategori').value = id_kategori[count].innerHTML;

            document.getElementById('ov-pecah').style.display = 'block';
        }
    }

    function closePecah(){
        document.getElementById('ov-pecah').style.display = 'none';
    }

    function submitPecahForm(){
        document.getElementById('pecah-form').submit();
    }

    function openTransfer(count){
        closeEdit();
        closePecah();

        if(document.getElementById('ov-transfer').style.display != 'block'){
            var id = this.document.getElementsByClassName('id');
            var id_trans = this.document.getElementsByClassName('id_trans');
            var id_akun = this.document.getElementsByClassName('id_akun');
            var id_kategori = this.document.getElementsByClassName('id_kategori');
            var tanggal = this.document.getElementsByClassName('tanggal');
            var deskripsi = this.document.getElementsByClassName('deskripsi');
            var debit = this.document.getElementsByClassName('debit');
            var kredit = this.document.getElementsByClassName('kredit');
            var periode = this.document.getElementsByClassName('periode');
            var inisial_donatur = this.document.getElementsByClassName('inisial_donatur');

            document.getElementById('tf-id').value = id[count].innerHTML;
            document.getElementById('tf-tanggal').value = tanggal[count].innerHTML;
            document.getElementById('tf-debit').value = debit[count].innerHTML;
            document.getElementById('tf-kredit').value = kredit[count].innerHTML;
            document.getElementById('tf-periode').value = periode[count].innerHTML;
            document.getElementById('tf-akun').value = id_akun[count].innerHTML;
            document.getElementById('tf-kategori').value = id_kategori[count].innerHTML;
            document.getElementById('tf-inisial_donatur').value = inisial_donatur[count].innerHTML;

            document.getElementById('ov-transfer').style.display = 'block';
        }
    }

    function closeTransfer(){
        document.getElementById('ov-transfer').style.display = 'none';
    }

    function submitTransferForm(){
        document.getElementById('tf-form').submit();
    }
</script>