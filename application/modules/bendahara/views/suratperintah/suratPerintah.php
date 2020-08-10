<link href="<?php echo base_url('css/perencanaan.css') ?>" rel="stylesheet">
<div class="content">
    <div>
        <h3 style='border-bottom: 2px solid black;'>Penerima Beasiswa</h3>
        <div id="periode">
            <label>Berikut adalah Penerima beasiswa periode:</label>
            <select name="periode" id="periode" onChange='periodeSpin(this)'>
                    <option value='-'>-</option>
                <?php foreach($periode as $p): ?>
                    <option value="<?php echo $p->periode_range; ?>"><?php echo $p->periode_range; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php foreach($periode as $p): ?>
            <table class='table-list' style='display:none' id='<?php echo $p->periode_range?>'>
                <tr>
                    <th width='250px'>Nama</th>
                    <th width='250px'>Nomor Rekening</th>
                </tr>
                <?php foreach($datas as $data): ?>
                <?php if($p->periode_range==$data->periode_range):?>
                    <tr>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->norek; ?></td>
                    </tr>
                <?php endif; endforeach; ?>
            </table>
        <?php endforeach; ?>
        Surat Perintah Transfer :
        <form action="<?= site_url('bendahara/suratperintah/downloadLaporan') ?>" method="POST" id='bukaPDF'>
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
        document.getElementById('formPeriode').value = choice;
        var reportContents = document.getElementsByClassName('table-list');
        var lengthOfArray = reportContents.length;
        for (var i=0; i<lengthOfArray;i++){
            reportContents[i].style.display='none';
        }
        document.getElementById(choice).style.display = 'block';
    }
</script>