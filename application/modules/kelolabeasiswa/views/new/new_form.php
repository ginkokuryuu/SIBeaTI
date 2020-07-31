<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif; ?>
    <div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Tambah Beasiswa</p></h1>
    </div>
    <form action="<?php base_url("kelolabeasiswa/beasiswa/add") ?>" method="post" enctype="multipart/form-data" >
        <div class="card my-4 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolabeasiswa/beasiswa') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group px-2">
                        <label for="nama">Nama Beasiswa<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" name="nama" placeholder="Nama Beasiswa" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 px-3">
                        <label for="tahun">Tahun<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?php echo form_error('tahun') ? 'is-invalid':'' ?>" id="tahun" name="tahun" placeholder="Tahun" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('tahun') ?>
                        </div>
                        </div>
                        <div class="form-group col-md-6 px-3">
                        <label for="periode">Periode<span style="color: red;">*</span></label>
                        <select class="form-control" name="periode" required>
                            <option selected>Pilih</option>
                            <option>1</option>
                            <option>2</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 px-3">
                        <label for="tanggal_mulai">Tanggal Mulai<span style="color: red;">*</span></label>
                        <input class="form-control <?php echo form_error('tanggal_mulai') ? 'is-invalid':'' ?>" name="tanggal_mulai" type="date" required/>
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal_mulai') ?>
                        </div>
                        </div>
                        <div class="form-group col-md-6 px-3">
                        <label for="tanggal_selesai">Tanggal Selesai<span style="color: red;">*</span></label>
                        <input class="form-control <?php echo form_error('tanggal_selesai') ? 'is-invalid':'' ?>" name="tanggal_selesai" type="date" required/>
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal_selesai') ?>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 px-3">
                        <label for="kuota_beasiswa">Kuota Beasiswa<span style="color: red;">*</span></label>
                        <input class="form-control <?php echo form_error('kuota_beasiswa') ? 'is-invalid':'' ?>" type="text" name="kuota_beasiswa" placeholder="Kuota Beasiswa" required/>
                        <div class="invalid-feedback">
                            <?php echo form_error('kuota_beasiswa') ?>
                        </div>
                        </div>
                        <div class="form-group col-md-6 px-3">
                        <label for="kuota_vote">Kuota Vote<span style="color: red;">*</span></label>
                        <input class="form-control <?php echo form_error('kuota_vote') ? 'is-invalid':'' ?>" type="text" name="kuota_vote" placeholder="Kuota Vote" required/>
                        <div class="invalid-feedback">
                            <?php echo form_error('kuota_vote') ?>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 px-3">
                        <label for="status_beasiswa">Status Beasiswa<span style="color: red;">*</span></label>
                        <select class="form-control" name="status_beasiswa" required>
                            <option selected>Dibuka</option>
                            <option>Ditutup</option>
                        </select>
                        </div>
                        <div class="form-group col-md-6 px-3">
                        <label for="status_pemilihan">Status Pemilihan<span style="color: red;">*</span></label>
                        <select class="form-control" name="status_pemilihan" required>
                            <option selected>Dibuka</option>
                            <option>Ditutup</option>
                        </select>
                        </div>
                    </div>
                </div>
		    </div>
            <div class="card-footer small text-muted">
                * data harus diisi
                <input class="btn btn-primary btn-sm float-right" type="submit" value="Simpan" />
            </div>
        </div>
    </form>
</div>
</html>