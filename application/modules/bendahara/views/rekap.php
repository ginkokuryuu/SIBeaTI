<?php
function changeNegNumber($number){
    if($number < 0){
        $number = abs($number);
        return "(" . $number . ")";
    }
    else{
        return $number;
    }
}

function saldoBerjalan($transaksi){
    if($transaksi != ''){
        $result = $transaksi->nominal_donasi + $transaksi->nominal_penyaluran + $transaksi->lain_lain;
    }
    else{
        $result = '';
    }
    return $result;
}

function formatAngka($angka){
    if($angka != ''){
        $len = strlen($angka);

        if(substr($angka, 0, 1) == "-"){
            $angka = substr($angka, 1, ($len - 1));
            $len = strlen($angka);
            $neg = "1";
        }
        else{
            $neg = "0";
        }


        if($len % 3 == 0){
            $count = floor($len / 3) - 1;
        }
        else{
            $count = floor($len / 3);
        }

        $string = "";

        for($i = 1; $i <= $count; $i++){
            $string = "." . substr($angka, ($len - ($i * 3)), 3) . $string;
        }

        if($count != 0){
            $string = substr($angka, 0, $count * (-3)) . $string;
        }
        else{
            $string = substr($angka, 0, $len) . $string;
        }

        if($neg == "1"){
            return "(" . $string . ")";
        }
        else{
            return $string;
        }
    }
    else{
        return '';
    }
}
?>

<div style='width: 100%; margin-left: 2%; margin-right: 2%; overflow: auto;'>
    <table class="table table-light" style='width: 96%;'>
        <thead class="thead-light text-center">
            <tr>
                <th colspan="13" scope="col">Rekapitulasi Beasiswa Alumni T. Informatika - ITS</th>
            </tr>
            <tr>
                <th style="border-style: solid; color: navy;" class="align-middle" rowspan="2" scope="col">Periode</td>
                <th style="border-style: solid; color: purple;" colspan="5" scope="col">Periodik</th>
                <th style="border-style: solid; color: darkslategrey;" colspan="5" scope="col">Kumulatif</th>
                <th style="border-style: solid; color: red;" class="align-middle" rowspan="2" scope="col">Saldo Berjalan</th>
                <th class="align-middle" rowspan="2" scope="col">Keterangan</th>
            </tr>
            <tr>
                <th style="border-style: solid; color: purple;" scope="col">Jumlah Donasi</th>
                <th style="border-style: solid; color: purple;" scope="col">Nominal Donasi</th>
                <th style="border-style: solid; color: purple;" scope="col">Jumlah Penerima</th>
                <th style="border-style: solid; color: purple;" scope="col">Nominal Penyaluran</th>
                <th style="border-style: solid; color: purple;" scope="col">Lain2</th>

                <th style="border-style: solid; color: darkslategrey;" scope="col">Jumlah Donasi</th>
                <th style="border-style: solid; color: darkslategrey;" scope="col">Nominal Donasi</th>
                <th style="border-style: solid; color: darkslategrey;" scope="col">Jumlah Penerima</th>
                <th style="border-style: solid; color: darkslategrey;" scope="col">Nominal Penyaluran</th>
                <th style="border-style: solid; color: darkslategrey;" scope="col">Lain2</th>
            </tr>
        </thead>
        <?php if($dataFetch): ?>
        <tbody>
            <?php $lastKumulatif = null;
            $count = 0;
            foreach($periodikPertahun as $perTah): ?>
            <tr class="text-right">
                <td class="text-center" style="border-style: solid; background: navy; color: white;" scope="col"><?php echo $perTah->periode_tahun ?? '' ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo $perTah->jumlah_donasi ?? '' ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo formatAngka($perTah->nominal_donasi ?? '') ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo $perTah->jumlah_penerima ?? '' ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo formatAngka($perTah->nominal_penyaluran ?? '' )?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo formatAngka($perTah->lain_lain ?? '' )?></td>
                
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo $kumulatifPertahun[$count]->jumlah_donasi ?? '' ?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo formatAngka($kumulatifPertahun[$count]->nominal_donasi ?? '') ?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo $kumulatifPertahun[$count]->jumlah_penerima ?? '' ?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo formatAngka($kumulatifPertahun[$count]->nominal_penyaluran  ?? '' )?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo formatAngka($kumulatifPertahun[$count]->lain_lain  ?? '' )?></td>

                <td style="border-style: solid; background: red; color: white;" scope="col"><?php echo formatAngka(saldoBerjalan($kumulatifPertahun[$count] ?? '' )) ?></td>
                <td class="text-left" style="border-style: solid;" scope="col">-</td>
            </tr>
            <?php $lastKumulatif = $kumulatifPertahun[$count];
            $count++;
            endforeach ?>

            <tr class="text-right">
                <td class="text-center" style="border-style: solid; background: navy; color: white;" scope="col"><?php echo $periodikActiveTahun[0]->periode_pertahun ?? '' ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo $periodikActiveTahun[0]->jumlah_donasi ?? '' ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo formatAngka($periodikActiveTahun[0]->nominal_donasi ?? '') ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo $periodikActiveTahun[0]->jumlah_penerima ?? '' ?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo formatAngka($periodikActiveTahun[0]->nominal_penyaluran ?? '' )?></td>
                <td style="border-style: solid; background: purple; color: white;" scope="col"><?php echo formatAngka($periodikActiveTahun[0]->lain_lain ?? '' )?></td>
                
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo $kumulatifActiveTahun[0]->jumlah_donasi ?? '' ?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo formatAngka($kumulatifActiveTahun[0]->nominal_donasi ?? '') ?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo $kumulatifActiveTahun[0]->jumlah_penerima ?? '' ?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo formatAngka($kumulatifActiveTahun[0]->nominal_penyaluran  ?? '')?></td>
                <td style="border-style: solid; background: darkslategrey; color: white;" scope="col"><?php echo formatAngka($kumulatifActiveTahun[0]->lain_lain  ?? '')?></td>

                <td style="border-style: solid; background: red; color: white;" scope="col"><?php echo formatAngka(saldoBerjalan($kumulatifActiveTahun[0] ?? '' )) ?></td>
                <td class="text-left" style="border-style: solid;" scope="col">-</td>
            </tr>

            <?php $count = 0;
            foreach($periodikPeriode as $perPeriod): ?>
            <tr class="text-right">
                <td class="text-center" style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo $perPeriod->nama_periode ?? '' ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo $perPeriod->jumlah_donasi ?? '' ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka($perPeriod->nominal_donasi ?? '') ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo $perPeriod->jumlah_penerima ?? '' ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka($perPeriod->nominal_penyaluran) ?? '' ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka($perPeriod->lain_lain) ?? '' ?></td>
                
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo $kumulatifPeriode[$count]->jumlah_donasi ?? '' ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka($kumulatifPeriode[$count]->nominal_donasi ?? '') ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo $kumulatifPeriode[$count]->jumlah_penerima ?? '' ?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka($kumulatifPeriode[$count]->nominal_penyaluran  ?? '')?></td>
                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka($kumulatifPeriode[$count]->lain_lain  ?? '')?></td>

                <td style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo formatAngka(saldoBerjalan($kumulatifPeriode[$count]  ?? '' )) ?></td>
                <td class="text-left" style="border-style: solid; <?php echo $count == $periodikCount ? 'background: yellow;': '' ?>" scope="col"><?php echo $keteranganPeriode[$count]->deskripsi ?? '' ?></td>
            </tr>
            <?php $count++;
            endforeach ?>
        </tbody>
        <?php endif; ?>
    </table>
</div>