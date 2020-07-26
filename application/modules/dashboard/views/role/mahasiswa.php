<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Berita</p></h1>
	</div>

	<!-- DataTables -->
	<?php foreach ($berita as $berita): ?>
		<div class="card mb-3">
			<div class="card-body">
						<tr>
							<td width="150">
								<h5><?php echo $berita->judul ?></h5>
							</td>
							<td>
								<?php echo $berita->isi_berita ?>
							</td>
							<br/>
							<td><small>
								<i class="fas fa-fw fa-clock"></i> Created at <?php echo $berita->tanggal_berita ?>
							</small></td>
						</tr>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<!-- /.container-fluid -->