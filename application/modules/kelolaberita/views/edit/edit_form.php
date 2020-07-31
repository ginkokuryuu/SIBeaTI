<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif; ?>
    <div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Edit Berita</p></h1>
    </div>

    <!-- Card  -->
    <form action="<?php base_url('kelolaberita/berita/edit') ?>" method="post" enctype="multipart/form-data" >
        <div class="card my-4 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolaberita/berita') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group row px-3 py-2">
                            <label for="judul" class="col-sm-3 col-form-label">Judul Berita<span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?php echo $berita->berita_id?>" />
                                <input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
                                    type="text" name="judul" value="<?php echo $berita->judul ?>"/>
                                <div class="invalid-feedback">
                                    <?php echo form_error('judul') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row px-3 py-2">
                            <label for="isi_berita" class="col-sm-3 col-form-label">Isi Berita<span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control <?php echo form_error('isi_berita') ? 'is-invalid':'' ?>" name="isi_berita" rows="5"><?php echo $berita->isi_berita ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('isi_berita') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row px-3 py-2">
                            <label for="attachment" class="col-sm-3 col-form-label">Attachment</label>
                            <div class="col-sm-9">
                                <input class="form-control-file <?php echo form_error('attachment') ? 'is-invalid':'' ?>" type="file" name="attachment" /> 
                                <div class="pt-3">
                                    <!-- show attachment if exist and you can delete old attachment-->
                                    <?php if (!empty($berita->attachment)) : ?>
                                        <input type="hidden" name="old_attachment" value="<?php echo $berita->attachment?>" />
                                        <p>Attachment sebelumnya: <?php echo $berita->attachment ?> <a class="btn btn-sm btn-danger" href="<?php echo site_url('kelolaberita/berita/deleteAttachment/'.$berita->berita_id) ?>" role="button"><i class="fa fa-trash"></i></a></p>
                                    <?php else : ?>
                                        <input type="hidden" name="old_attachment" value="NULL" />
                                    <?php endif; ?>
                                </div>
                            </div>
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