<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .img-rounded {
            border-radius: 50%!important;
        }
    </style>
</head>
    <div class="container-fluid">
        <div class="col-md-12 col-lg-12">
                <h1><p style="color:#092147">Biodata</p></h1>
        </div>
        <!-- pills -->
        <div class="col mb-3">
            <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link" id="diri-tab" data-toggle="tab" href="#diri" role="tab">Data Pribadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ortu-tab" data-toggle="tab" href="#ortu" role="tab">Data Orang Tua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="rumah-tab" data-toggle="tab" href="#rumah" role="tab">Data Tempat Tinggal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cerita-tab" data-toggle="tab" href="#cerita" role="tab">Cerita Anda</a>
                </li>
            </ul>
            <!-- pills content -->
            <div class="tab-content" id="myTabContent">
                <!-- panel data pribadi -->
                <div class="tab-pane fade in active" id="diri" role="tabpanel" aria-labelledby="diri-tab">
                    <div class="row py-4">
                        <!-- pasfoto -->
                        <div class="col-4">
                            <form action="<?= site_url('biodata/diri/save_foto') ?>" enctype="multipart/form-data" role="form" method="POST">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group px-2">
                                            <label for="foto">Pas Foto<span style="color: red;">*</span></label>
                                            <center class="pt-3 pb-5">
                                                <!-- set default pasfoto -->
                                                <?php 
                                                if (isset($biodata->foto)) {
                                                    $photo = $biodata->foto;
                                                } else{
                                                    $photo = 'user_no_image.png';
                                                }
                                                ?>
                                                <img src="<?php echo base_url('images/foto/' .$photo) ?>" class="img-rounded" width="200" height="200">
                                            </center>
                                            <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" type="file" name="foto" id="foto" required/>
                                            <input type="hidden" name="old_image" value="<?php echo $biodata->foto ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('foto') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input class="btn btn-primary btn-sm float-right" type="submit" name="save_foto" value="Simpan" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- detail data pribadi -->
                        <div class="col-8">
                            <form action="<?= site_url('biodata/diri/save_pribadi') ?>" enctype="multipart/form-data" role="form" method="POST">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-group px-2">
                                                <label for="nama_lengkap">Nama Lengkap<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $biodata->nama_lengkap ?? '' ?>" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                <label for="nama_panggilan">Nama Panggilan<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan" value="<?php echo $biodata->nama_panggilan ?? '' ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                <label for="ktp">No. KTP<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="ktp" name="ktp" placeholder="No. KTP" value="<?php echo $biodata->ktp ?? '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                <label for="nrp">NRP<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="nrp" name="nrp" placeholder="NRP" value="<?php echo $biodata->nrp ?? '' ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                <label for="angkatan">Angkatan<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Angkatan" value="<?php echo $biodata->angkatan ?? '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                <label for="semester">Semester<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester" value="<?php echo $biodata->semester ?? '' ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                <label for="ipk">IPK<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="ipk" name="ipk" placeholder="IPK" value="<?php echo $biodata->ipk ?? '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                <label for="no_telepon">No. Telepon<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No. Telepon" value="<?php echo $biodata->no_telepon ?? '' ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                <label for="asal_sma">Asal SMA<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="asal_sma" name="asal_sma" placeholder="Asal SMA" value="<?php echo $biodata->asal_sma ?? '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                <label for="ukt">UKT<span style="color: red;">*</span></label>
                                                <input type="number" class="form-control" id="ukt" name="ukt" placeholder="UKT" value="<?php echo $biodata->ukt ?? '' ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                <label for="nama_bank">Nama Bank<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?php echo $biodata->nama_bank ?? '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                <label for="nama_rekening">Nama Rekening<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" placeholder="Nama Rekening" value="<?php echo $biodata->nama_rekening ?? '' ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                <label for="no_rekening">No. Rekening<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="no_rekening" name="no_rekening" placeholder="No. Rekening" value="<?php echo $biodata->no_rekening ?? '' ?>" required>
                                                </div>
                                            </div>
                                            <fieldset class="form-group px-2 py-2">
                                                <div class="row">
                                                <legend class="col-form-label col-sm-6 pt-0">Apakah Anda Sedang Menerima Beasiswa Lain?<span style="color: red;">*</span></legend>
                                                <div class="col-sm-6">
                                                    <div class="form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="beasiswa_lain" id="beasiswa_lain1" value="1" <?php if (isset($biodata->beasiswa_lain) && $biodata->beasiswa_lain=="1") echo "checked";?> required>
                                                    <label class="form-check-label" for="beasiswa_lain1">
                                                        Ya
                                                    </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="beasiswa_lain" id="beasiswa_lain2" value="0" <?php if (isset($biodata->beasiswa_lain) && $biodata->beasiswa_lain=="0") echo "checked";?>>
                                                    <label class="form-check-label" for="beasiswa_lain2">
                                                        Tidak
                                                    </label>
                                                    </div>
                                                </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 px-3">
                                                    <label for="nama_beasiswa">Nama Beasiswa</label>
                                                    <input type="text" class="form-control" id="nama_beasiswa" name="nama_beasiswa" placeholder="Nama Beasiswa Lain" value="<?php echo $biodata->nama_beasiswa ?? '' ?>">
                                                </div>
                                                <div class="form-group col-md-6 px-3">
                                                    <label for="nilai_beasiswa">Nilai Beasiswa</label>
                                                    <input type="text" class="form-control" id="nilai_beasiswa" name="nilai_beasiswa" placeholder="Nilai Beasiswa Lain" value="<?php echo $biodata->nilai_beasiswa ?? '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input class="btn btn-primary btn-sm float-right" type="submit" name="save_pribadi" value="Simpan" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- panel data orang tua -->
                <div class="tab-pane fade" id="ortu" role="tabpanel" aria-labelledby="ortu-tab">
                    <div class="row pt-4">
                        <div class="col-12">
                            <form action="<?= site_url('biodata/diri/save_ortu') ?>" enctype="multipart/form-data" role="form" method="POST">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <div class="form-group row px-3 py-2">
                                                    <label for="telepon_ortu" class="col-sm-4 col-form-label">No. Telepon Orang Tua<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="telepon_ortu" name="telepon_ortu" placeholder="No. Telepon Orang Tua" value="<?php echo $biodata->telepon_ortu ?? '' ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-3 py-2">
                                                    <label for="pekerjaan_ortu" class="col-sm-4 col-form-label">Pekerjaan Orang Tua<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="pekerjaan_ortu" name="pekerjaan_ortu" placeholder="Pekerjaan Orang Tua" value="<?php echo $biodata->pekerjaan_ortu ?? '' ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-3 py-2">
                                                    <label for="penghasilan_ortu" class="col-sm-4 col-form-label">Penghasilan Orang Tua<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="penghasilan_ortu" name="penghasilan_ortu" placeholder="Penghasilan Orang Tua" value="<?php echo $biodata->penghasilan_ortu ?? '' ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 p-3"> 
                                                <p>Catatan :</p>                              
                                                <p>Isi dengan (NA) jika orang tua sudah tidak ada</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input class="btn btn-primary btn-sm float-right" type="submit" name="save_ortu" value="Simpan" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
                <!-- panel data tempat tinggal -->
                <div class="tab-pane fade" id="rumah" role="tabpanel" aria-labelledby="rumah-tab">
                    <div class="row pt-4">
                        <div class="col-12">
                            <form action="<?= site_url('biodata/diri/save_rumah') ?>" enctype="multipart/form-data" role="form" method="POST">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <div class="form-group row px-3 py-2">
                                                    <label for="link_google_map" class="col-sm-4 col-form-label">Link Google Map Rumah<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="link_google_map" name="link_google_map" placeholder="Link Google Map Rumah" value="<?php echo $biodata->link_google_map ?? '' ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-3 py-2">
                                                    <label for="status_rumah" class="col-sm-4 col-form-label">Status Rumah<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="status_rumah" name="status_rumah" placeholder="Hak Milik/Sewa/Atau Lain Lain" value="<?php echo $biodata->status_rumah ?? '' ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-3 py-2">
                                                    <label for="foto_rumah" class="col-sm-4 col-form-label">Foto Rumah<span style="color: red;">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control-file <?php echo form_error('foto_rumah') ? 'is-invalid':'' ?>" type="file" name="foto_rumah" required/>
                                                        <input type="hidden" name="old_image2" value="<?php echo $biodata->foto_rumah ?>" />
                                                        <div class="pt-3">
                                                            <!-- show foto_rumah if exist -->
                                                            <?php if (isset($biodata->foto_rumah)) : ?>
                                                            <img src="<?php echo base_url('images/rumah/' .$biodata->foto_rumah) ?>" width="500" height="300">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 p-3">
                                                <p>Catatan :</p>                                
                                                <p>Bagian dengan (*) bersifat harus diisi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input class="btn btn-primary btn-sm float-right" type="submit" name="save_rumah" value="Simpan" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- panel cerita anda -->
                <div class="tab-pane fade" id="cerita" role="tabpanel" aria-labelledby="cerita-tab">
                    <div class="row py-4">
                        <div class="col-12">
                            <form action="<?= site_url('biodata/diri/save_cerita') ?>" enctype="multipart/form-data" role="form" method="POST">
                                <div class="card">
                                    <div class="card-body">                           
                                        <div class="form-group">
                                            <div class="form-group row px-3 py-2">
                                                <label for="kegiatan_selain_kuliah" class="col-sm-4 col-form-label">Kegiatan selain kuliah<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="kegiatan_selain_kuliah" name="kegiatan_selain_kuliah" rows="3" placeholder="Kegiatan selain kuliah" required><?php echo $biodata->kegiatan_selain_kuliah ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row px-3 py-2">
                                                <label for="organisasi" class="col-sm-4 col-form-label">Organisasi yang (pernah) diikuti<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="organisasi" name="organisasi" rows="3" placeholder="Organisasi yang (pernah) diikuti" required><?php echo $biodata->organisasi ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row px-3 py-2">
                                                <label for="kehidupan_sehari_hari" class="col-sm-4 col-form-label">Kehidupan sehari-hari saat ini<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="kehidupan_sehari_hari" name="kehidupan_sehari_hari" rows="3" placeholder="Kehidupan sehari-hari saat ini" required><?php echo $biodata->kehidupan_sehari_hari ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row px-3 py-2">
                                                <label for="cerita_keluarga" class="col-sm-4 col-form-label">Keluarga Anda<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="cerita_keluarga" name="cerita_keluarga" rows="3" placeholder="Keluarga Anda" required><?php echo $biodata->cerita_keluarga ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row px-3 py-2">
                                                <label for="dampak_covid" class="col-sm-4 col-form-label">Dampak wabah COVID-19 yang dialami<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="dampak_covid" name="dampak_covid" rows="3" placeholder="Dampak wabah COVID-19 yang dialami" required><?php echo $biodata->dampak_covid ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row px-3 py-2">
                                                <label for="capaian_ke_depan" class="col-sm-4 col-form-label">Apa yang akan dicapai dalam 5 tahun ke depan<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="capaian_ke_depan" name="capaian_ke_depan" rows="3" placeholder="Apa yang akan dicapai dalam 5 tahun ke depan" required><?php echo $biodata->capaian_ke_depan ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row px-3 py-2">
                                                <label for="ketika_menjadi_alumni" class="col-sm-4 col-form-label">Apa yang akan dilakukan untuk ITS ketika sudah menjadi alumni<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                <textarea class="form-control" id="ketika_menjadi_alumni" name="ketika_menjadi_alumni" rows="3" placeholder="Apa yang akan dilakukan untuk ITS ketika sudah menjadi alumni" required><?php echo $biodata->ketika_menjadi_alumni ?? '' ?></textarea>
                                                </div>
                                            </div>
                                            <fieldset class="form-group px-3 py-2">
                                                <div class="row">
                                                <legend class="col-form-label col-sm-4 pt-0">Bersedia terlibat dalam kegiatan alumni teknik informatika ITS<span style="color: red;">*</span></legend>
                                                <div class="col-sm-8 pt-3">
                                                    <div class="form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="bersedia_kegiatan_alumni" id="bersedia_kegiatan_alumni1" value="1" <?php if (isset($biodata->bersedia_kegiatan_alumni) && $biodata->bersedia_kegiatan_alumni=="1") echo "checked";?> required>
                                                    <label class="form-check-label" for="bersedia_kegiatan_alumni1">
                                                        Ya
                                                    </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="bersedia_kegiatan_alumni" id="bersedia_kegiatan_alumni2" value="0" <?php if (isset($biodata->bersedia_kegiatan_alumni) && $biodata->bersedia_kegiatan_alumni=="0") echo "checked";?>>
                                                    <label class="form-check-label" for="bersedia_kegiatan_alumni2">
                                                        Tidak
                                                    </label>
                                                    </div>
                                                </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input class="btn btn-primary btn-sm float-right" type="submit" name="save_cerita" value="Simpan" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
    <script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
    <script>
        $(document).ready(function(){
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            console.log(activeTab);
            if(activeTab){
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
</html>
