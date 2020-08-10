<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        th, .td-center {
            text-align: center;
        }
    </style>
</head>
<?php 
    $items = array();
    foreach($penerima as $penerima) {
        $items[] = $penerima->calon_id;
    }
?>

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
        <h1><p style="color:#092147">Calon Penerima</p></h1>
        <h5><p style="color:#092147"><?php echo $beasiswa->nama ?? ''?> Tahun <?php echo $beasiswa->tahun ?? ''?> Periode <?php echo $beasiswa->periode ?? ''?></p></h5>
        <p style="color:#092147">Kuota penerimaan: <?php echo $beasiswa->kuota_beasiswa ?? ''?> </p>
        <p style="color:#092147">Telah dipilih: <?php echo count($items)?> </p>
    </div>

    <!-- DataTables -->
    <form action="<?= site_url('dashboard/penerima/add_penerima') ?>" role="form" method="POST" id="formPenerima">
        <div class="card mb-3 mx-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama Lengkap</th>
                                <th>Penghasilan Orang Tua</th>
                                <th>UKT</th>
                                <th>IPK</th>
                                <th>Jumlah Vote</th>
                                <th>Aksi</th>
                                <th class="table-active">Layak</th>							
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($calon as $calon): ?>
                                <tr>
                                    <td class="td-center">
                                        <?php echo $calon->nrp ?>
                                    </td>
                                    <td>
                                        <?php echo $calon->nama_lengkap ?>
                                    </td>
                                    <td class="td-center">
                                        Rp <?php echo number_format($calon->penghasilan_ortu) ?>
                                    </td>
                                    <td class="td-center">
                                        Rp <?php echo number_format($calon->ukt) ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $calon->ipk ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $calon->jumlah ?>
                                    </td>
                                    <td class="td-center">
                                        <a href="<?php echo site_url('dashboard/biodata/index/'.$calon->biodata_id) ?>" class="btn btn-sm text-primary"><i class="fas fa-list"></i> Detail</a>
                                    </td>
                                    <td class="table-active td-center">
                                        <input type="checkbox" name="calon_id[]" value="<?php echo $calon->calon_id; ?>" <?php if(in_array($calon->calon_id, $items)){echo'checked disabled';} ?>>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary btn-sm float-right" type="button" name="save_vote" value="Submit" data-toggle="modal" data-target="#submitPenerimaModal" <?php if(isset($beasiswa)){echo $beasiswa->kuota_beasiswa == count($items) ? 'disabled': 'btn-primary';} else {echo 'disabled';} ?>/>
            </div>
        </div>
    </form>
</div>
</html>
