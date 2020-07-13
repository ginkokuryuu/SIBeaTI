<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("berita/_partials/head.php") ?>
    <style type="text/css">
        .cf-formwrap textarea[readonly] {background-color:purple !important;}
        .img-rounded {
            width: 367px;
            height: 521px;
        }
    </style>
</head>

<body id="page-top">

	<?php $this->load->view("berita/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("berita/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
                <div class="col-md-12 col-lg-12">
                        <h1><p style="color:#092147">Pengajuan</p></h1>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="<?php echo site_url('pengajuan/diri') ?>" class="btn btn-primary <?php echo $this->uri->segment(2) == 'diri' ? 'active': '' ?>" role="button">Data Pribadi</a>
                    <a href="<?php echo site_url('pengajuan/ortu') ?>" class="btn btn-primary <?php echo $this->uri->segment(2) == 'ortu' ? 'active': '' ?>" role="button">Data Orang Tua</a>
                    <a href="<?php echo site_url('pengajuan/rumah') ?>" class="btn btn-primary <?php echo $this->uri->segment(2) == 'rumah' ? 'active': '' ?>" role="button">Data Tempat Tinggal</a>
                    <a href="<?php echo site_url('pengajuan/cerita') ?>" class="btn btn-primary <?php echo $this->uri->segment(2) == 'cerita' ? 'active': '' ?>" role="button">Cerita Anda</a>
				</div>
				<!-- DataTables -->
                <!-- Form -->
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Pas Foto*</label>
                                <br>
                                <label for="inputImage"><img src="https://jasafotosemarang.files.wordpress.com/2016/10/rizky.jpg?w=367&h=522" class="img-rounded" alt="Responsive image"></label>
                            </div>
                            <div class="form-group col-md-8">
                                <div class="form-group">
                                    <label for="inputAddress">Nama Lengkap*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nama_lengkap?>" readonly>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama Panggilan*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nama_panggilan?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">No. KTP*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->ktp?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">NRP*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nrp?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Angkatan*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->angkatan?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Semester*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->semester?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">IPK*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->ipk?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">No. Telepon*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->no_telepon?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Asal SMA*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->asal_sma?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">UKT*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->ukt?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nama Bank*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nama_bank?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama Rekening*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nama_rekening?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">No. Rekening*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->no_rekening?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Apakah Anda Sedang Menerima Beasiswa Lain*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->beasiswa_lain?>" readonly>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama Beasiswa*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nama_beasiswa?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nilai Beasiswa*</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $biodata->nilai_beasiswa?>" readonly>
                                    </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div> -->
                        <!-- <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                            </div>
                        </div> -->
                        </form>
                    </div>
                </div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			
		</div>
		<!-- /.content-wrapper -->
        
	</div>
	<!-- /#wrapper -->
    <?php $this->load->view("berita/_partials/footer.php") ?>

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
