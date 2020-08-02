<link href="<?php echo base_url('css/perencanaan.css') ?>" rel="stylesheet">
<div class="content">
    <div>
        <h3 style='border-bottom: 2px solid black;'>Perencanaan</h3   >
        <p> Tabel Berikut adalah Perencanaan yang sudah dibuat sebelumnya :
        <table class='table-list'>
            <tr>
                <th>Jumlah Orang</th>
                <th>Besar Beasiswa</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach($datas as $data): ?>
                <tr>
                    <td width='50%'><?php echo $data->JumlahOrang; ?></td>
                    <td width='50%'><?php echo $data->BesarBeasiswa; ?></td>
                    <td width='50%'><?php echo $data->tanggal; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script>

</script>