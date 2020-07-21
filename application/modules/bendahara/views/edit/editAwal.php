<link href="<?php echo base_url('css/edit-transaksi.css') ?>" rel="stylesheet">
<div class='border shadow overlay' id='ov-edit'>
    <div class='header'>
        <h2 style='float: left;'>Edit</h1>
        <div class='close-btn' style='float: right;'>
            <button style='background: none; border: none; color: white; font-size: 130%;' onclick='closeEdit()'>x</button>
        </div>
    </div>
    <div class='content'>
        <form action="<?= site_url('bendahara/edit/save') ?>" method="POST" id='edit-form'>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" required></input>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Format harus yyyy-mm-dd (contoh 2020-12-31)
                </small>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" required></input>
            </div>
            <div class="form-group">
                <label for="debit">Debit</label>
                <input type="text" class="form-control" id="debit" name="debit" placeholder="debit" required></input>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Format tanpa titik ataupun koma, kalau kosong isi dengan 0. (contoh 20000000)
                </small>
            </div>
            <div class="form-group">
                <label for="kredit">Kredit</label>
                <input type="text" class="form-control" id="kredit" name="kredit" placeholder="kredit" required></input>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Format tanpa titik ataupun koma, kalau kosong isi dengan 0. (contoh 20000000)
                </small>
            </div>
            <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" class="form-control" id="periode" name="periode" placeholder="periode" required></input>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Format harus yyyymm (contoh 202012)
                </small>
            </div>
            <div class="form-group">
                <label for="jenis_trans">Jenis Transaksi</label>
                <select class="form-control" name="jenis_trans" id="jenis_trans">
                <!-- ntar bikin tabel role ae dan ntar di loop lewat data tabel itu -->
                    <?php foreach($jenis_trans as $jenis_tran): ?>
                        <option value="<?php echo $jenis_tran->id ?>"><?php echo $jenis_tran->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="akun">Akun</label>
                <select class="form-control" name="akun" id="akun">
                <!-- ntar bikin tabel role ae dan ntar di loop lewat data tabel itu -->
                    <?php foreach($akuns as $akun): ?>
                        <option value="<?php echo $akun->id ?>"><?php echo $akun->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" name="kategori" id="kategori">
                <!-- ntar bikin tabel role ae dan ntar di loop lewat data tabel itu -->
                    <?php foreach($kategoris as $kategori): ?>
                        <option value="<?php echo $kategori->id ?>"><?php echo $kategori->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- hidden data -->
            <input type="hidden" name='id' id='id' required>
        </form>
    </div>
    <button class='btn btn-primary' onclick='submitEditForm()' style='margin-left: 3%;'>Save</button>
</div>

<div style="margin-left:5%; margin-right:5%;">
    <div class="alert alert-primary" role="alert">
        Ingat, ini tidak akan disimpan ke database sebelum di simpan!
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
            <td class='saldo'><?php echo $data->saldo; ?></td>
            <td class='periode'><?php echo $data->periode; ?></td>
            <td class='jenis_trans'><?php echo $data->jenis_transaksi; ?></td>
            <td class='akun'><?php echo $data->akun; ?></td>
            <td class='kategori'><?php echo $data->kategori; ?></td>
            <td>
                <div>
                    <button class='btn btn-primary' id='edit' onclick='openEdit(<?php echo $count; ?>)'>Edit</button>
                    <button class='btn btn-danger' id='delete' name='<?php echo $data->id; ?>'>Delete</button>
                    <button class='btn btn-secondary' id='pecah' name='<?php echo $data->id; ?>'>Pecah</button>
                    <button class='btn btn-secondary' id='transfer' name='<?php echo $data->id; ?>'>Transfer</button>
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

            document.getElementById('tanggal').value = tanggal[count].innerHTML;
            document.getElementById('deskripsi').value = deskripsi[count].innerHTML;
            document.getElementById('debit').value = debit[count].innerHTML;
            document.getElementById('kredit').value = kredit[count].innerHTML;
            document.getElementById('periode').value = periode[count].innerHTML;
            document.getElementById('jenis_trans').value = id_trans[count].innerHTML;
            document.getElementById('akun').value = id_akun[count].innerHTML;
            document.getElementById('kategori').value = id_kategori[count].innerHTML;

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
</script>