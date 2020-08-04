<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        th, .td-center {
            text-align: center;
        }
    </style>
</head>
<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
        <h1><p style="color:#092147">Pendaftar</p></h1>
        <h5><?php echo ucwords($beasiswa->nama) ?? ''?> Tahun <?php echo $beasiswa->tahun ?? ''?> Periode <?php echo $beasiswa->periode ?? ''?></h5>
    </div>
    <!-- DataTables -->
    <form>
        <div class="card my-4 mx-3">
            <div class="card-header">
                
                <a href="<?php echo site_url('kelolabeasiswa/beasiswa') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
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
                                        <a href="<?php echo site_url('kelolabeasiswa/biodata/list/'.$beasiswa->beasiswa_id.'/'.$pendaftar->biodata_id) ?>" class="btn btn-sm text-primary"><i class="fas fa-list"></i> Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
</html>