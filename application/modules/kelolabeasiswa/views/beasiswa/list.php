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
		<h1><p style="color:#092147">Pengelolaan Beasiswa</p></h1>
    </div>

    <!-- DataTables -->
    <form action="" role="form" method="POST">
        <div class="card my-4 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolabeasiswa/beasiswa/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>Tahun</th>
								<th>Periode</th>
								<th>Status Beasiswa</th>
								<th>Status Pemilihan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($beasiswa as $key => $beasiswa): ?>
								<tr>
									<td class="td-center">
										<?php echo $key + 1 ?>
									</td>
									<td>
										<?php echo ucwords($beasiswa->nama) ?>
									</td>
									<td class="td-center">
										<?php echo $beasiswa->tahun ?>
									</td>
									<td class="td-center">
										<?php echo $beasiswa->periode ?>
									</td>
									<td class="td-center">
										<?php echo $beasiswa->status_beasiswa ?>
									</td>
									<td class="td-center">
										<?php echo $beasiswa->status_pemilihan ?>
									</td>
                                    					<td class="td-center">
										<a href="" data-toggle="collapse" data-target="#detailBeasiswa<?php echo $beasiswa->beasiswa_id ?>" class="btn btn-sm text-dark"><i class="fas fa-plus"></i> Detail</a>
                                        					<a href="<?php echo site_url('kelolabeasiswa/beasiswa/edit/'.$beasiswa->beasiswa_id) ?>" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    					</td>
								</tr>				
								<tr class="bg-light">
									<td style="padding: 0 !important;"></td>
									<td colspan="6" style="padding: 0 !important;">
										<div id="detailBeasiswa<?php echo $beasiswa->beasiswa_id ?>" class="collapse">
											<div class="p-3">
												<div class="row">
													<div class="col-2">Tanggal Mulai</div>
													<div class="col-3">: <?php echo date("d-m-Y", strtotime($beasiswa->tanggal_mulai)) ?></div>
													<div class="col-2">Kuota Beasiswa</div>
													<div class="col-2">: <?php echo $beasiswa->kuota_beasiswa ?></div>
													<div class="col-2"><a href="<?php echo site_url('kelolabeasiswa/biodata/index/'.$beasiswa->beasiswa_id) ?>" class="btn-sm text-primary"><i class="fas fa-user"></i> Data Pendaftar</a></div>
												</div>
												<div class="row">
													<div class="col-2">Tanggal Selesai</div>
													<div class="col-3">: <?php echo date("d-m-Y", strtotime($beasiswa->tanggal_selesai)) ?></div>
													<div class="col-2">Kuota Vote</div>
													<div class="col-2">: <?php echo $beasiswa->kuota_vote ?></div>
													<div class="col-2"><a href="<?php echo site_url('kelolabeasiswa/penerima/index/'.$beasiswa->beasiswa_id) ?>" class="btn-sm text-primary"><i class="fas fa-graduation-cap"></i> Data Penerima</a></div>
												</div>
											</div>
										</div>
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
