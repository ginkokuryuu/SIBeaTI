<link href="<?php echo base_url('css/laporan.css') ?>" rel="stylesheet">
<div class="content">
    <div>
        <label for="laporan">Jenis Laporan :</label>
        <select name="report" id="report" onChange="laporanSpinner(this);">
            <option value="none" selected disabled hidden>pilih jenis laporan</option>
            <option value="neraca">Neraca</option>
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
        <table id='table-neraca'>
            <tr>
                <th>Saldo</th>
                <th colspan='3'>Transaksi</th>
            </tr>
            <tr>
                <th>Akun</th>
                <th>T1-Penerimaan</th>
                <th>T2-Pengeluaran</th>
                <th>Saldo</th>
            </tr>
            <?php foreach($akun as $akun):?>
                <tr style="font-weight :bold;">
                    <td id="data_akun"><a style="display:inline;" class=<?php echo "child".$akun->nama;?> onclick="neraca_button(this)" id=<?php echo $akun->nama;?> href="#">[ - ]</a><?php echo $akun->nama;?></td>
                    <td class="table_numeral"><?php $format= $akun->penerimaan_tahun; echo number_format($format, 0, ",", ".");?></td>
                    <td class="table_numeral"><?php $format= $akun->pengeluaran_tahun; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                    <td class="table_numeral"><?php $format= $akun->saldo_tahun; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                </tr>
                
                <?php foreach($t_periode as $tp):?>
                    <?php if($akun->nama==$tp->nama):?>
                    <tr class=<?php echo "child".$akun->nama;?> id="<?php echo $akun->nama;?>">
                        <td id="data_tahun"><a style="display:inline;" class="<?php echo "child".$akun->nama." child".$tp->periode_tahun;?>" onclick="neraca_button(this)" id=<?php echo $akun->nama.$tp->periode_tahun;?> href="#">[ - ]</a><?php echo $tp->periode_tahun;?></td>
                        <td class="table_numeral"><?php $format= $tp->penerimaan_tahun; echo number_format($format, 0, ",", ".");?></td>
                        <td class="table_numeral"><?php $format= $tp->pengeluaran_tahun; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                        <td class="table_numeral"><?php $format= $tp->saldo_tahun; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                    </tr>
                    
                    <?php foreach($t_bulan as $tb):?>
                        <?php if($akun->nama==$tb->nama && $tp->periode_tahun==$tb->periode_tahun):?>
                        <tr class="<?php echo "child".$akun->nama." child".$tp->periode_tahun;?>" id="<?php echo $akun->nama.$tp->periode_tahun;?>">
                            <td id="data_bulan"><a style="display:inline;" class="<?php echo "child".$akun->nama." child".$tp->periode_tahun." child".$tb->periode;?>" onclick="neraca_button(this)" id=<?php echo $akun->nama.$tp->periode_tahun.$tb->periode;?> href="#">[ - ]</a><?php echo $tb->nama_bulan;?></td>
                            <td class="table_numeral"><?php $format=$tb->penerimaan_tahun; echo number_format($format, 0, ",", ".");?></td>
                            <td class="table_numeral"><?php $format=$tb->pengeluaran_tahun;  if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                            <td class="table_numeral"><?php $format=$tb->saldo_tahun; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                        </tr>
                            <?php foreach($kategori as $k):?>
                            <?php if($akun->nama==$k->nama && $tp->periode_tahun==$k->periode_tahun && $tb->periode==$k->periode):?>
                            <tr class="<?php echo "child".$akun->nama." child".$tp->periode_tahun." child".$tb->periode;?>" id="<?php echo $akun->nama.$tp->periode_tahun;?>">
                                <td id="data_kategori"><?php echo $k->kategori;?></td>
                                <td class="table_numeral"><?php $format=$k->penerimaan_tahun; echo number_format($format, 0, ",", ".");?></td>
                                <td class="table_numeral"><?php $format=$k->pengeluaran_tahun;  if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                                <td class="table_numeral"><?php $format=$k->saldo_tahun; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></td>
                            </tr>
                            <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endforeach;?>
            <tr id='total'>
                <?php foreach($total as $sum):?>
                <th>Total</th>
                <th class="table_numeral"><?php $format= $sum->penerimaan_total; echo number_format($format, 0, ",", ".");?></th>
                <th class="table_numeral"><?php $format= $sum->pengeluaran_total; if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></th>
                <th class="table_numeral"><?php $format= $sum->saldo_total ;if($format<0) echo "(".number_format(($format*-1), 0, ",", ".").")"; else echo number_format($format, 0, ",", ".");?></th>
            <?php endforeach;?>
        </table>
    </div>
    <div class="report-content" id="laporan-bulanan"  style="display:none;">
    Laporan Content
    </div>
    <?php foreach($periode as $p):?>
        <div class="report-content" id=<?php echo $p->id; ?>  style="display:none;">
            <div class="textBoxHeader">
                <div class="s-Icon" id=<?php echo $p->id;?> onclick="fnSelect(this);">
                    <i class="far fa-fw fa-copy" style = "position:relative; top:3px;"></i>
                </div>
            </div>
            <div class="textBox" id=<?php echo "textBox".$p->id;?> contenteditable>
                *Laporan Beasiswa Alumni T.Informatika*
                <br/><br/>
                _*A. Penerimaan & Pengeluaran Periode <?php echo $p->nama; ?>*_<br/>
                1. Donatur
                <br/>
                <?php $i = 0; $first=0; $len = count($donatur); foreach($donatur as $d):?>
                    <?php if($d->periode==$p->id):?>
                        <?php if( $i<=$len-1&& $first!=0) echo ", ";?>
                        <?php echo $d->donatur; $first=1;?>
                    <?php endif; $i++; ?>
                <?php endforeach;?>
                <br/>
                <br/>
                2. Posisi Keuangan<br/>
                <?php foreach($counts as $count):?>
                    <?php if($count->periode==$p->id):?>
                        <?php $format=$count->periodeSebelum; if($format<0) $format=($format*-1);echo "Saldo Akhir Bulan ".$p->namasebelum." : Rp.".number_format($format, 0, ",", ".");?><br/>
                        <?php $format=$count->penerimaan; if($format<0) $format=($format*-1);echo "Penerimaan Bulan ".$p->nama." : Rp.".number_format($format, 0, ",", ".");?><br/>
                        <?php $format=$count->pengeluaran; if($format<0) $format=($format*-1); echo "Penyaluran Bulan ".$p->nama." : Rp.".number_format($format, 0, ",", ".");?><br/>
                        <?php $format=$count->saldo; if($format<0) $format=($format*-1); echo "Saldo Akhir Bulan ".$p->nama." : Rp.".number_format($format, 0, ",", ".");?><br/>
                    <?php endif; ?>
                <?php endforeach; ?>
                <br/>
                _*B. Penyaluran Beasiswa Alumni IF_*<br/>
                <br/>
                1. <?php echo $p->deskripsi?><br/>
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
    function neraca_button(component){
        if(component.innerHTML=='[ + ]'){
            var childs = document.getElementsByClassName(component.className);
            var lengthOfArray = childs.length;
            for (var i=0; i<lengthOfArray;i++){
                childs[i].style.display='table-row';
            };
            component.style.display='inline';
            component.innerHTML='[ - ]';
            
            var list_link = document.getElementsByTagName('A');
            for (var i=0; i<list_link.length;i++){
                if((list_link[i].parentNode.id=='data_tahun' || list_link[i].parentNode.id=='data_bulan') && list_link[i].style.display!='inline'){
                    list_link[i].style.display='inline';
                }
                if(list_link[i].innerHTML=='[ + ]' && list_link[i].style.display=='inline'){
                    var childs = document.getElementsByClassName(list_link[i].className);
                    var lengthOfArray = childs.length;
                    for (var j=0; j<lengthOfArray;j++){
                        childs[j].style.display='none';
                    }
                    list_link[i].style.display='inline';
                }
            }
        }
        else if(component.innerHTML=='[ - ]'){
            var childs = document.getElementsByClassName(component.className);
            var lengthOfArray = childs.length;
            for (var i=0; i<lengthOfArray;i++){
                childs[i].style.display='none';
            };
            component.style.display='inline';
            component.innerHTML='[ + ]';
            return;
        }
        
    }
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