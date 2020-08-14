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

<div style="margin-left:5%; margin-right:5%; overflow: auto;">
    <table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <?php foreach($keys as $key): ?>
                <th scope="col"><?php echo $key; ?></th>
            <?php endforeach; ?>
            <th scope='col'>Action</th>
        </tr>
        <tr>
            <th scope="col">Search</th>
            <form action="<?= site_url('bendahara/edit/') ?>" method="POST" id='search-form'>
                <th scope="col">
                    <input type="text" class="form-control" name="tanggal_s" value=""></input>
                </th>
                <th scope="col">
                    <input type="text" class="form-control" name="deskripsi_s" value=""></input>
                </th>
                <th scope="col">
                    <input type="text" class="form-control" name="debit_s" value=""></input>
                </th>
                <th scope="col">
                    <input type="text" class="form-control" name="kredit_s" value=""></input>
                </th>
                <th scope="col">
                    <input type="text" class="form-control" name="saldo_s" value=""></input>
                </th>
                <th scope="col">
                    <input type="text" class="form-control" name="periode_s" value=""></input>
                </th>
                <th scope="col">
                    <select class="form-control" name="id_jenis_s">
                        <option value="">Semua</option>
                        <?php foreach($jenis_trans as $jenis_tran): ?>
                            <option value="<?php echo $jenis_tran->id ?>"><?php echo $jenis_tran->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <th scope="col">
                    <select class="form-control" name="id_akun_s">
                        <option value="">Semua</option>
                        <?php foreach($akuns as $akun): ?>
                            <option value="<?php echo $akun->id ?>"><?php echo $akun->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <th scope="col">
                    <select class="form-control" name="id_kategori_s">
                        <option value="">Semua</option>
                        <?php foreach($kategoris as $kategori): ?>
                            <option value="<?php echo $kategori->id ?>"><?php echo $kategori->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <th scope="col">
                    <input type="text" class="form-control" name="donatur_s" value=""></input>
                </th>
                <th scope="col">
                    <input type="submit" class="form-control btn btn-primary" name="search" value="Search"></input>
                </th>
                
            </form>
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