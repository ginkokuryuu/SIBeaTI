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
        <h1><p style="color:#092147">Penerima</p></h1>
        <h5><?php echo ucwords($beasiswa->nama) ?? ''?> Tahun <?php echo $beasiswa->tahun ?? ''?> Periode <?php echo $beasiswa->periode ?? ''?></h5>
    </div>
    <!-- DataTables -->
    <form>
        <div class="card my-4 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolabeasiswa/beasiswa') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="<?php echo site_url('kelolabeasiswa/penerima/exportPdf/'.$beasiswa->beasiswa_id) ?>" class="float-right text-danger" target="_blank"><i class="fas fa-file-export"></i> Export Data Penerima</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NRP</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Bank</th>
                                <th>Nomor Rekening</th>
                                <th>Nama Rekening</th>							
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penerima as $key=>$penerima): ?>
                                <tr>
                                    <td class="td-center">
                                        <?php echo $key + 1 ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $penerima->nrp ?>
                                    </td>
                                    <td>
                                        <?php echo $penerima->nama_lengkap ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $penerima->nama_bank ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $penerima->no_rekening ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo $penerima->nama_rekening ?>
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