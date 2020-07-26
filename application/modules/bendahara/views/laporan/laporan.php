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
        <div class="report-content" id="periode" style='none'>
            <label for="laporan">Periode :</label>
            <select name="report" id="report" onChange="periodeSpinner(this)">
                <option value="none" selected disabled hidden>pilih periode</option>
                <?php foreach($datas as $p): ?>
                    <option value=<?php echo $p; ?>><?php echo $p; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
    </div>
    <div class="report-content" id="--" style="display=none;">
    Pilih Jenis Laporan
    </div>
    <div class="report-content" id="neraca" style="display=none;">
    Neraca Content
    </div>
    <div class="report-content" id="laporan-bulanan"  style="display=none;">
    Laporan Content
    </div>
    <?php foreach($datas as $p):?>
        <div class="report-content" id=<?php echo $p; ?>  style="display=none;">
            <div id="textBoxHeader">
                <div id="s-Icon" onclick="fnSelect()">
                    <i class="far fa-fw fa-copy" style = "position:relative; top:-3px;"></i>
                </div>
            </div>
            <div id="textBox">
                <?php echo $p; ?>
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
	function fnSelect() {
        var objId='textBox';
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