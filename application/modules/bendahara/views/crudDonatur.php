<div style='width: 100%; margin-left: 5%; margin-right: 5%;'>
    <table class="table table-light" style='width: 30%;'>
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Inisial Donatur</th>
            <th scope="col">Nama Donatur</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0;
            foreach($allDonatur as $donatur): ?>
            <tr>
                <th scope="row"><?php echo $count + 1; ?></th>
                <td class='inisial'><?php echo $donatur->inisial; ?></td>
                <form action='<?= site_url("bendahara/crud_donatur/save/$donatur->inisial") ?>' method="POST" id='edit-form'>
                    <td>
                        <input type="text" name="nama" id="nama" placeholder="Nama Donatur" value='<?php echo $donatur->nama; ?>'></input>
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