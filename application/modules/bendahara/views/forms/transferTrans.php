<div class='border shadow overlay' id='ov-transfer'>
    <div class='header'>
        <h2 style='float: left;'>Transfer</h1>
        <div class='close-btn' style='float: right;'>
            <button style='background: none; border: none; color: white; font-size: 130%;' onclick='closeTransfer()'>x</button>
        </div>
    </div>
    <div class='content'>
        <form action="<?= site_url('bendahara/edit/transfer') ?>" method="POST" id='tf-form'>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="tf-deskripsi" name="tf-deskripsi" placeholder="deskripsi" required></input>
            </div>
            <div class="form-group">
                <label for="akun">Akun Tujuan</label>
                <select class="form-control" name="tf-akun_tujuan" id="tf-akun_tujuan">
                <!-- ntar bikin tabel role ae dan ntar di loop lewat data tabel itu -->
                    <?php foreach($akuns as $akun): ?>
                        <option value="<?php echo $akun->id ?>"><?php echo $akun->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Tanggal</label>
                <input type="text" class="form-control" name='tf-tanggal' id='tf-tanggal' required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Format harus yyyy-mm-dd (contoh 2020-12-31)
                </small>
            </div>
            <!-- hidden data -->
            <input type="hidden" name='tf-id' id='tf-id' required>
            <input type="hidden" name='tf-debit' id='tf-debit' required>
            <input type="hidden" name='tf-kredit' id='tf-kredit' required>
            <input type="hidden" name='tf-periode' id='tf-periode' required>
            <input type="hidden" name='tf-akun' id='tf-akun' required>
            <input type="hidden" name='tf-kategori' id='tf-kategori' required>
            <input type="hidden" name='tf-inisial_donatur' id='tf-inisial_donatur' required>
        </form>
    </div>
    <button class='btn btn-primary' onclick='submitTransferForm()' style='margin-left: 3%;'>Transfer</button>
</div>