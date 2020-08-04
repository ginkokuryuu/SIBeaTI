<div style='width: 100%; margin-left: 5%; margin-right: 5%;'>
    <table class="table table-light" style='width: 30%;'>
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID Periode</th>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0;
            foreach($allPeriode as $periode): ?>
            <tr>
                <th scope="row"><?php echo $count + 1; ?></th>
                <td class='inisial'><?php echo $periode->id; ?></td>
                <form action='<?= site_url("bendahara/crud_periode/save/$periode->id") ?>' method="POST" id='edit-form'>
                    <td>
                        <input type="text" name="nama" id="nama" placeholder="Nama Periode" value='<?php echo $periode->nama; ?>'></input>
                    </td>
                    <td>
                        <input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value='<?php echo $periode->deskripsi; ?>'></input>
                    </td>
                    <td>
                        <input type="text" name="status" id="status" placeholder="Status" value='<?php echo $periode->status; ?>'></input>
                    </td>
                    <td>
                        <input type="submit" name="Save" id="submit" class='btn btn-primary'></input>
                    </td>
                </form>
            </tr>
            <?php $count++;
            endforeach;?>
        </tbody>
    </table>
</div>