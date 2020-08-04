<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Berita</p></h1>
	</div>

	<!-- DataTables -->
	<?php foreach ($berita as $berita): ?>
		<div class="card my-4 mx-3">
			<div class="card-body">
				<tr>
					<td width="150">
						<h5><?php echo $berita->judul ?></h5>
					</td>
					<td>
						<?php echo $berita->isi_berita ?>
					</td>
					<br/>
					<td>
						<small>
							<!-- show attachment if exist -->
							<?php if (isset($berita->attachment)) : ?>
								<i class="fa fa-fw fa-file"></i> Attachment : <a href="<?php echo site_url('download/index/'.$berita->attachment) ?>"><?php echo $berita->attachment ?></a><br>
							<?php endif; ?>
							<i class="fas fa-fw fa-clock"></i> Created at <?php echo date("d-m-Y h:i A", strtotime($berita->tanggal_berita)) ?>
						</small>
					</td>
				</tr>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<!-- /.container-fluid -->