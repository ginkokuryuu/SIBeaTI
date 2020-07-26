<link href="<?php echo base_url('css/perencanaan.css') ?>" rel="stylesheet">
<div class="content">
    <div>
        <h3 style='border-bottom: 2px solid black;'>Penerima Beasiswa</h3   >
        <div id="periode">
            <label>Berikut adalah Penerima beasiswa periode:</label>
            <select name="report" id="report" onChange='periodeSpin(this)'>
                    <option value='-'>-</option>
                <?php foreach($periode as $p): ?>
                    <option value=<?php echo $p; ?>><?php echo $p; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <table class='table-list'>
            <tr>
                <th>Nama</th>
                <th>NRP</th>
            </tr>
            <?php foreach($datas as $data): ?>
                <tr>
                    <td style='width:50%;'><?php echo $data->Nama; ?></td>
                    <td><?php echo $data->NRP; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        Surat Perintah Transfer :
        <form action="<?= site_url('bendahara/SuratPerintah/DownloadLaporan') ?>" method="POST" id='bukaPDF'>
            <input type="hidden" name='periode' id='formPeriode' value='-'></input>
        </form>
        <button class='btn btn-primary' onclick='openPDF()' style='background-color: gray;'>Print Surat Perintah</button>
    </div>
</div>
<script>
    function openPDF(){
        document.getElementById('bukaPDF').submit();
    }
    function periodeSpin(report){
        var choice = report.options[report.selectedIndex].value;
        document.getElementById('formPeriode').value=choice;
    }
</script>