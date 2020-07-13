<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("berita/_partials/head.php") ?>
</head>

<script type="text/javascript">
  $(function(){
    if(<?php $beasiswa->periode = 1?>){
      $('.your-class').addClass('disabled');
    }
  });
</script>

<body id="page-top">

	<?php $this->load->view("berita/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("berita/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
                <div class="col-md-12 col-lg-12">
                    <h1><p style="color:#092147">Pengajuan</p></h1>
                </div>
				<!-- DataTables -->
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
											<?php echo $beasiswa->tanggal_mulai ?>
										</td>
                                        <td>
											<?php echo $beasiswa->tanggal_selesai ?>
										</td>
                                        <td>
											<?php echo $beasiswa->status ?>
										</td>
										<td>
                                            <!-- <button type="button" class="your-class btn btn-primary">Daftar</button> -->
											<a href="<?php echo site_url('pengajuan/diri') ?>" role="button" class="btn btn-primary <?php echo $beasiswa->status == 'Ditutup' ? 'disabled': '' ?>">Daftar</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("berita/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("berita/_partials/scrolltop.php") ?>
	<?php $this->load->view("berita/_partials/modal.php") ?>

	<?php $this->load->view("berita/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
