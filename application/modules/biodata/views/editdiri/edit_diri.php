<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("berita/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("berita/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("berita/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("berita/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('biodata/diri') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("modules/biodata/editdiri/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $biodata->biodata_id?>" />

							<div class="form-group">
								<label for="nama_lengkap">Nama Lengkap*</label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								 type="text" name="nama_lengkap" value="<?php echo $biodata->nama_lengkap ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_panggilan">Nama Panggilan</label>
								<input class="form-control <?php echo form_error('nama_panggilan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_panggilan" value="<?php echo $biodata->nama_panggilan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_panggilan') ?>
								</div>
							</div>


							<!-- <div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div> -->

							<!-- <div class="form-group">
								<label for="name">Description*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="Product description..."><?php echo $product->description ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div> -->

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* data harus diisi
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

		<?php $this->load->view("berita/_partials/js.php") ?>

</body>

</html>
