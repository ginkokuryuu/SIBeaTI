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
		<h1><p style="color:#092147">Pengajuan</p></h1>
	</div>
	<!-- DataTables -->
	<div class="card my-4 mx-3">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Tahun</th>
							<th>Periode</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Status</th>
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
									<?php echo $beasiswa->nama ?>
								</td>
								<td class="td-center">
									<?php echo $beasiswa->tahun ?>
								</td>
								<td class="td-center">
									<?php echo $beasiswa->periode ?>
								</td>
								<td class="td-center">
									<?php echo date("d-m-Y", strtotime($beasiswa->tanggal_mulai)) ?>
								</td>
								<td class="td-center">
									<?php echo date("d-m-Y", strtotime($beasiswa->tanggal_selesai)) ?>
								</td>
								<td class="td-center">
									<?php echo $beasiswa->status_beasiswa ?? '' ?>
								</td>
								<td class="td-center">
									<a href="<?php echo site_url('pengajuan/diri/index/'.$beasiswa->beasiswa_id.'/'.$user_id) ?>" role="button" class="btn btn-sm <?php echo $beasiswa->status_beasiswa == 'Ditutup' || $beasiswa->status_daftar == '1' ? 'btn-secondary disabled': 'btn-primary' ?>">Daftar</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</html>
