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
        </tr>
    </thead>
    <tbody>
        <?php $count = 0;
        foreach($datas as $data): ?>
        <tr>
            <th scope="row"><?php echo $count; ?></th>
            <td><?php echo $data->tanggal; ?></td>
            <td><?php echo $data->deskripsi; ?></td>
            <td><?php echo $data->debit; ?></td>
            <td><?php echo $data->kredit; ?></td>
            <td><?php echo $data->saldo; ?></td>
            <td><?php echo $data->periode; ?></td>
            <td><?php echo $data->id_jenistransaksi; ?></td>
            <td><?php echo $data->id_akun; ?></td>
            <td><?php echo $data->id_kategori; ?></td>
        </tr>
        <?php $count++;
        endforeach;?>
    </tbody>
    </table>
</div>