<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo site_url('kelolaberita/berita') ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">

            <form action="<?php base_url('kelolaberita/berita/add') ?>" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="judul">Judul*</label>
                    <input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
                        type="text" name="judul" />
                    <div class="invalid-feedback">
                        <?php echo form_error('judul') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="isi_berita">Isi Berita*</label>
                    <input class="form-control <?php echo form_error('isi_berita') ? 'is-invalid':'' ?>"
                        type="text" name="isi_berita" />
                    <div class="invalid-feedback">
                        <?php echo form_error('isi_berita') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_berita">Tanggal Berita</label>
                    <input class="form-control <?php echo form_error('tanggal_berita') ? 'is-invalid':'' ?>"
                        type="text" name="tanggal_berita" placeholder="Tidak perlu diisi (Current Timestamp)" readonly/>
                    <div class="invalid-feedback">
                        <?php echo form_error('tanggal_berita') ?>
                    </div>
                </div>

                <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>
		</div>

        <div class="card-footer small text-muted">
            * data harus diisi
        </div>
    </div>
</div>
</html>
