<div style="margin-left:5%; margin-right:5%;">
    <a href="<?= site_url('bendahara/perencanaan/calculator') ?>"><h3>Buat Perencanaan Baru</h3></a>
    <div style="margin-bottom: 1%;">
        <form action="<?= site_url('bendahara/perencanaan/deleteStatus') ?>" method="POST" id='delete-form'>
            <label for="status">Hapus semua perencanaan dengan status:</label>
            <select name="status">
                <option value="terlaksana">Terlaksana</option>
                <option value="batal">Batal</option>
                <option value="rencana">Rencana</option>
            </select>
            <td scope='row'>
                <input type="submit" class="btn btn-danger" name="submit" value="Delete" required></input>
            </td>
        </form>
    </div>

    <table class="table table-light">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Status</th>
        <th scope="col">Untuk Periode</th>
        <th scope="col">Jumlah Penerima</th>
        <th scope="col">Nominal Penyaluran</th>
        <th colspan="2" scope='col'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 0;
        foreach($allPerencanaan as $perencanaan): ?>
        <tr>
            <th scope="row"><?php echo $count + 1; ?></th>
            <form action="<?= site_url('bendahara/perencanaan/save') ?>" method="POST" id='edit-form'>
                <td scope='row' style="display: none;">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $perencanaan->id; ?>" required></input>
                </td>
                <td scope='row'>
                    <select class="form-control" name="status">
                    <!-- ntar bikin tabel role ae dan ntar di loop lewat data tabel itu -->
                        <option value="terlaksana" <?php if ($perencanaan->status == "terlaksana") echo "selected='selected'";?> >Terlaksana</option>
                        <option value="batal" <?php if ($perencanaan->status == "batal") echo "selected='selected'";?> >Batal</option>
                        <option value="rencana" <?php if ($perencanaan->status == "rencana") echo "selected='selected'";?> >Rencana</option>
                    </select>
                </td>
                <td scope='row'>
                    <input type="text" class="form-control" name="untuk_periode" value="<?php echo $perencanaan->untuk_periode; ?>" required></input>
                </td>
                <td scope='row'>
                    <input type="text" class="form-control" name="jumlah_penerima" value="<?php echo $perencanaan->jumlah_penerima; ?>" required></input>
                </td>
                <td scope='row'>
                    <input type="text" class="form-control" name="nominal_penyaluran" value="<?php echo $perencanaan->nominal_penyaluran; ?>" required></input>
                </td>
                <td scope='row'>
                    <input type="submit" class="form-control btn btn-primary" name="submit" value="Save" required></input>
                </td>
            </form>
            <form action="<?= site_url('bendahara/perencanaan/delete') ?>" method="POST" id='delete-form'>
                <td scope='row' style="display: none;">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $perencanaan->id; ?>" required></input>
                </td>
                <td scope='row'>
                    <input type="submit" class="form-control btn btn-danger" name="submit" value="Delete" required></input>
                </td>
            </form>
        </tr>
        <?php $count++;
        endforeach;?>
    </tbody>
    </table>
</div>