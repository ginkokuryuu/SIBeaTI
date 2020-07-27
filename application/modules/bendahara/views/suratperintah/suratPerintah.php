<link href="<?php echo base_url('css/perencanaan.css') ?>" rel="stylesheet">
<div class="content">
    <div>
        <h3 style='border-bottom: 2px solid black;'>Penerima Beasiswa</h3>
        <div id="periode">
            <label>Berikut adalah Penerima beasiswa periode:</label>
            <select name="periode" id="periode" onChange='periodeSpin(this)'>
                    <option value='-'>-</option>
                <?php foreach($periode as $p): ?>
                    <option value=<?php echo $p; ?>><?php echo $p; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php foreach($periode as $p){ ?>
            <table class='table-list' style='display:none' id=<?php echo $p?>>
                <tr>
                    <th>Nama</th>
                    <th>NRP</th>
                </tr>
                <?php foreach($datas as $data){ ?>
                    <tr>
                        <td width='250px'><?php echo $data->Nama; ?></td>
                        <td width='250px'><?php echo $data->NRP; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
        Surat Perintah Transfer :
        <form action="<?= site_url('bendahara/SuratPerintah/DownloadLaporan') ?>" method="POST" id='bukaPDF'>
            <input type="hidden" name='periode' id='formPeriode' value='-'></input>
        </form>
        <button class='btn btn-primary' onclick='openPDF()' style='background-color: gray;'>Print Surat Perintah</button>
    </div>
</div>
<script>
    function openPDF(){
        if(document.getElementById('formPeriode').value=='-'){
            alert('Silahkan Pilih Periode Terlebih Dahulu');
        }
        else document.getElementById('bukaPDF').submit();
    }
    function periodeSpin(report){
        var choice = report.options[report.selectedIndex].value;
        document.getElementById('formPeriode').value=choice;
        var reportContents = document.getElementsByClassName('table-list');
        var lengthOfArray = reportContents.length;
        for (var i=0; i<lengthOfArray;i++){
            reportContents[i].style.display='none';
        }
        document.getElementById(choice).style.display = 'block';
    }
</script>