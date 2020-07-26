<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pengajuan</p></h1>
	</div>
	<!-- DataTables -->
	<div class="col-md-12 col-lg-12">
		<div class="card mb-3">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
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
							<?php foreach ($beasiswa as $beasiswa): ?>
								<tr>
									<td>
										<?php echo $beasiswa->nama ?>
									</td>
									<td>
										<?php echo $beasiswa->tahun ?>
									</td>
									<td>
										<?php echo $beasiswa->periode ?>
									</td>
									<td>
										<?php echo date("d-m-Y", strtotime($beasiswa->tanggal_mulai)) ?>
									</td>
									<td>
										<?php echo date("d-m-Y", strtotime($beasiswa->tanggal_selesai)) ?>
									</td>
									<td>
										<?php echo $beasiswa->status ?>
									</td>
									<td>
										<a href="<?php echo site_url('pengajuan/diri/index/'.$beasiswa->beasiswa_id.'/'.$user_id) ?>" role="button" class="btn btn-sm <?php echo $beasiswa->status == 'Ditutup' || $beasiswa->status_daftar == '1' ? 'btn-secondary disabled': 'btn-primary' ?>">Daftar</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</html>
