<div class='form-inline' >
    <div style='width: 100%; margin-left: 5%; margin-right: 5%;'>
        <table class="table table-light" style='width: 30%; float: left; margin-right: 5%;'>
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0;
                foreach($allKategori as $kategori): ?>
                <tr>
                    <th scope="row"><?php echo $count + 1; ?></th>
                    <td class='id-kt' style='display: none;'><?php echo $kategori->id; ?></td>
                    <td class='nama-kt'><?php echo $kategori->nama; ?></td>
                    <?php if($count > 3): ?>
                    <td>
                        <a class="btn btn-danger" href='<?= site_url("bendahara/crud_ak/deleteKategori/$kategori->id") ?>'>Delete</a>
                    </td>
                    <?php else: ?>
                    <td>Tidak dapat dihapus</td>
                    <?php endif; ?>
                </tr>
                <?php $count++;
                endforeach;?>
            </tbody>
        </table>
        <table class="table table-light" style='width: 30%;'>
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Akun</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0;
                foreach($allAkun as $akun): ?>
                <tr>
                    <th scope="row"><?php echo $count + 1; ?></th>
                    <td class='id-ak' style='display: none;'><?php echo $akun->id; ?></td>
                    <td class='nama-ak'><?php echo $akun->nama; ?></td>
                    <?php if($count > 1): ?>
                    <td>
                        <a class="btn btn-danger" href='<?= site_url("bendahara/crud_ak/deleteAkun/$akun->id") ?>'>Delete</a>
                    </td>
                    <?php else: ?>
                    <td>Tidak dapat dihapus</td>
                    <?php endif; ?>
                </tr>
                <?php $count++;
                endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<div style="margin-left:5%; margin-right:5%; display: block;">
    <form action="<?= site_url('bendahara/crud_ak/createakun') ?>" method="POST" id='akun-form'>
        <div class="form-group">
            <label for="tanggal">Nama Akun Baru</label>
            <div class="form-inline">
                <input type="text" class="form-control" id="nama-ak" name="nama-ak" placeholder="Akun" required></input>
                <input type="submit" name="create-akun" class="btn btn-primary" style='margin-left: 2%;' value="Buat" />
            </div>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Jangan yang sudah ada
            </small>
        </div>
    </form>

    <form action="<?= site_url('bendahara/crud_ak/createkategori') ?>" method="POST" id='kategori-form'>
        <div class="form-group">
            <label for="tanggal">Nama Kategori Baru</label>
            <div class="form-inline">
                <input type="text" class="form-control" id="nama-kt" name="nama-kt" placeholder="Kategori" required></input>
                <input type="submit" name="create-kategori" class="btn btn-primary" style='margin-left: 2%;' value="Buat" />
            </div>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Jangan yang sudah ada
            </small>
        </div>
    </form>
</div>