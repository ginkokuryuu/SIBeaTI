<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif; ?>

    <!-- Card  -->
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo site_url('kelolabeasiswa/beasiswa') ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">

            <form action="<?php base_url("kelolabeasiswa/beasiswa/edit") ?>" method="post" enctype="multipart/form-data" >

                <input type="hidden" name="id" value="<?php echo $beasiswa->beasiswa_id?>" />

                <div class="form-group">
                    <label for="nama">Nama*</label>
                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                        type="text" name="nama" value="<?php echo $beasiswa->nama ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun*</label>
                    <input class="form-control <?php echo form_error('tahun') ? 'is-invalid':'' ?>"
                        type="text" name="tahun" value="<?php echo $beasiswa->tahun ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tahun') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="periode">Periode*</label>
                    <input class="form-control <?php echo form_error('periode') ? 'is-invalid':'' ?>" type="text" name="periode" value="<?php echo $beasiswa->periode ?>" readonly/>
                    <br>
                    <select class="form-control" name="periode">
                        <option selected>Pilih</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                    <input type="hidden" name="old_periode" value="<?php echo $beasiswa->periode ?>" />
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal mulai*</label>
                    <input class="form-control <?php echo form_error('tanggal_mulai') ? 'is-invalid':'' ?>"
                        name="tanggal_mulai" type="date" value="<?php echo $beasiswa->tanggal_mulai ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tanggal_mulai') ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal selesai*</label>
                    <input class="form-control <?php echo form_error('tanggal_selesai') ? 'is-invalid':'' ?>"
                        name="tanggal_selesai" type="date" value="<?php echo $beasiswa->tanggal_selesai ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tanggal_selesai') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kuota_beasiswa">Kuota beasiswa*</label>
                    <input class="form-control <?php echo form_error('kuota_beasiswa') ? 'is-invalid':'' ?>"
                        type="text" name="kuota_beasiswa" value="<?php echo $beasiswa->kuota_beasiswa ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('kuota_beasiswa') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kuota_vote">Kuota vote*</label>
                    <input class="form-control <?php echo form_error('kuota_vote') ? 'is-invalid':'' ?>"
                        type="text" name="kuota_vote" value="<?php echo $beasiswa->kuota_vote ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('kuota_vote') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" type="text" name="status" value="<?php echo $beasiswa->status ?>" readonly/>
                    <br>
                    <select class="form-control" name="status">
                        <option selected>Pilih</option>
                        <option>Dibuka</option>
                        <option>Ditutup</option>
                    </select>
                    <input type="hidden" name="old_status" value="<?php echo $beasiswa->status ?>" />
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
