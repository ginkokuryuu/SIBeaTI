<link href="<?php echo base_url('css/laporan.css') ?>" rel="stylesheet">
<div class="content">
    <div>
        <label for="laporan">Jenis Laporan :</label>
        <select name="report" id="report" onChange="laporanSpinner(this);">
            <option value="none" selected disabled hidden>pilih jenis laporan</option>
            <option value="neraca">Neraca</option>
            <option value="laporan-bulanan">Laporan Bulanan</option>
            <option value="copy-text">Ringkasan</option>
        </select>
        <div class="report-content" id="periode" style='display:none;'>
            <label for="laporan">Periode :</label>
            <select name="report" id="report" onChange="periodeSpinner(this)">
                <option value="none" selected disabled hidden>pilih periode</option>
                <?php foreach($periode as $p): ?>
                    <option value=<?php echo $p->id; ?>><?php echo $p->id; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
    </div>
    <div class="report-content" id="--" style="display:none;">
    Pilih Jenis Laporan
    </div>
    <div class="report-content" id="neraca" style="display:none;">
    Neraca Content
    </div>
    <div class="report-content" id="laporan-bulanan"  style="display:none;">
    Laporan Content
    </div>
    <?php foreach($periode as $p):?>
        <div class="report-content" id=<?php echo $p->id; ?>  style="display:none;">
            <div class="textBoxHeader">
                <div class="s-Icon" id=<?php echo $p->id;?> onclick="fnSelect(this);">
                    <i class="far fa-fw fa-copy" style = "position:relative; top:-3px;"></i>
                </div>
            </div>
            <div class="textBox" id=<?php echo "textBox".$p->id;?> contenteditable>
                *Laporan Beasiswa Alumni T.Informatika*
                <br/><br/>
                _*A. Penerimaan & Pengeluaran Periode <?php echo $p->nama; ?>*_<br/>
                1. Donatur
                <br/>
                <?php $i = 0; $first=0; $len = count($datas);foreach($datas as $data):?>
                    <?php if($data->periode==$p->id):?>
                        <?php if( $i<=$len-1&& $first!=0) echo ", ";?>
                        <?php echo $data->donatur; $first=1;?>
                    <?php endif; $i++; ?>
                <?php endforeach; ?>
                <br/>
                <br/>
                2. Posisi Keuangan<br/>
                <?php foreach($counts as $count):?>
                    <?php if($count->periode==$p->id):?>
                        <?php echo "Saldo Akhir Bulan ".$p->nama." : ".$count->periodeSebelum;?><br/>
                        <?php echo "Penerimaan Bulan ".$p->nama." : ".$count->penerimaan;?><br/>
                        <?php echo "Penyaluran Bulan ".$p->nama." : ".$count->pengeluaran;?><br/>
                        <?php echo "Saldo Akhir Bulan ".$p->nama." : ".$count->saldo;?><br/>
                    <?php endif; ?>
                <?php endforeach; ?>
                <br/>
                _*B. Penyaluran Beasiswa Alumni IF_*<br/>
                <br/>
                1. Rencana penyaluran selanjutnya pada bulan Juni-2020<br/>
                2. Bagi para donatur beasiswa dapat dikirimkan langsung ke rekening berikut.<br/>
                <br/>
                Bank Mandiri Cabang Kota Kediri<br/>
                *No Rekening 171-00-1010111-4*<br/>
                a.n Fadelis Sukya (T.Informatika ITS Angkatan 2000)<br/>
                Terlampir Rekap Penerimaan penyaluran Periode <?php echo $p->nama;?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script>
    function laporanSpinner(report){
        var choice = report.options[report.selectedIndex].value;
        var reportContents = document.getElementsByClassName('report-content');
        var lengthOfArray = reportContents.length;
        for (var i=0; i<lengthOfArray;i++){
            reportContents[i].style.display='none';
        }
        document.getElementById('periode').style.display = 'inline';
        if(choice!='copy-text') {
            document.getElementById('periode').style.display = 'none';
            document.getElementById(choice).style.display = 'block';
        }
    }

    function periodeSpinner(selected){
        var choice = selected.options[selected.selectedIndex].value;
        var reportContents = document.getElementsByClassName('report-content');
        var lengthOfArray = reportContents.length;
        for (var i=0; i<lengthOfArray;i++){
            reportContents[i].style.display='none';
        }
        document.getElementById(choice).style.display = 'block';
        document.getElementById('periode').style.display = 'inline';
    }

	function fnSelect(data) {
        var objId='textBox'+data.id;
		fnDeSelect();
		if (document.selection) {
		var range = document.body.createTextRange();
 	        range.moveToElementText(document.getElementById(objId));
		    range.select();
		}
		else if (window.getSelection) {
		var range = document.createRange();
		range.selectNode(document.getElementById(objId));
		window.getSelection().addRange(range);
		}
        document.execCommand("copy");
	}
    function fnDeSelect() {
		if (document.selection) document.selection.empty();
		else if (window.getSelection)
                window.getSelection().removeAllRanges();
	}
</script>