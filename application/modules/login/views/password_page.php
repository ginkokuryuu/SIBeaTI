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
            <?php if ($this->session->flashdata('category_success')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('category_error')) { ?>
                <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
            <?php } ?>

                <div class="col-md-12 col-lg-12">
                    <h1><p style="color:#092147">Ganti Password</p></h1>
                    <div class="col-12 col-md-5 mx-auto pt-5">
                        <form action="<?= site_url('login/changepassword') ?>" method="POST">
                            <div class="form-group">
                                <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password" required />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w-100" value="Submit" />
                            </div>
                        </form>
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
        var new_password = document.getElementById("newpassword")
        , confirm_password = document.getElementById("confirmpassword");

        function validatePassword(){
            if(new_password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Password tidak sesuai");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        new_password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>

</html>
