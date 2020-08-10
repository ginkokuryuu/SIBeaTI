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
    $limit = array();
    foreach($calon as $calon) {
        $items[] = $calon->pendaftar_id;
        $limit[] = $calon->calon_id;
    }
?>
<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
        <h1><p style="color:#092147">Pendaftar</p></h1>
        <h5><p style="color:#092147"><?php echo $beasiswa->nama ?? ''?> Tahun <?php echo $beasiswa->tahun ?? ''?> Periode <?php echo $beasiswa->periode ?? ''?></p></h5>
        <p style="color:#092147">Kuota vote: <?php echo $beasiswa->kuota_vote ?? ''?> </p>
        <p style="color:#092147">Telah divote: <?php echo count($limit)?> </p>
    </div>

    <!-- DataTables -->
    <form action="<?= site_url('dashboard/calon/add_calon') ?>" role="form" method="POST" id="formVote">
        <div class="card mb-4 mx-3">
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
                                <th>Aksi</th>
                                <th class="table-active" style="text-align: center">Vote</th>							
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pendaftar as $pendaftar): ?>
                                <tr>
                                    <td class="td-center">
                                        <?php echo $pendaftar->nrp ?>
                                    </td>
                                    <td>
                                        <?php echo $pendaftar->nama_lengkap ?>
                                    </td>
                                    <td class="td-center">
                                        Rp <?php echo number_format($pendaftar->penghasilan_ortu) ?>
                                    </td>
                                    <td class="td-center">
                                        Rp <?php echo number_format($pendaftar->ukt) ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $pendaftar->ipk ?>
                                    </td>
                                    <td class="td-center">
                                        <a href="<?php echo site_url('dashboard/biodata/index/'.$pendaftar->biodata_id) ?>" class="btn btn-sm text-primary"><i class="fas fa-list"></i> Detail</a>
                                    </td>
                                    <td class="table-active td-center">
                                        <input type="checkbox" name="pendaftar_id[]" value="<?php echo $pendaftar->pendaftar_id; ?>" <?php if(in_array($pendaftar->pendaftar_id, $items)){echo'checked disabled';} ?>>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary btn-sm float-right" type="button" name="save_vote" value="Submit" data-toggle="modal" data-target="#submitVoteModal" <?php if (isset($beasiswa)) { echo $beasiswa->kuota_vote == count($limit) ? 'disabled': 'btn-primary';} else {echo 'disabled';} ?>/>
            </div>
        </div>
    </form>

</div>
</html>
