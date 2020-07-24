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