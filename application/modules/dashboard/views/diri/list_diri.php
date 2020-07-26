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
        
        <!-- biodata -->
        <div class="col mb-3">
            <a class="btn btn-primary" href="<?php echo site_url('dashboard') ?>" role="button">Kembali</a>
            <div class="row py-4">
                <!-- pasfoto -->
                <div class="col-4">
                    <form>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group pt-2">
                                    <center class="pt-3">
                                        <!-- set default pasfoto -->
                                        <?php 
                                        if (isset($biodata->foto)) {
                                            $photo = $biodata->foto;
                                        } else{
                                            $photo = 'user_no_image.png';
                                        }
                                        ?>
                                        <img src="<?php echo base_url('images/foto/' .$photo) ?>" class="img-rounded mb-4" width="200" height="200">
                                        <br>
                                        <h5><b><?php echo $biodata->nama_lengkap ?? '' ?></b></h5>
                                        <p><?php echo $biodata->nrp ?? '' ?></p>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Penghasilan Ortu</th>
                                                    <td>:</td>
                                                    <td>Rp <?php echo $biodata->penghasilan_ortu ?? '' ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">UKT</th>
                                                    <td>:</td>
                                                    <td>Rp <?php echo $biodata->ukt ?? '' ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IPK</th>
                                                    <td>:</td>
                                                    <td><?php echo $biodata->ipk ?? '' ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- pills -->
                <div class="col-8">
                        <div class="card">
                            <div class="card-header p-0">
                                <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
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
                            </div>
                            <div class="card-body">
                                <!-- pills content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- panel data pribadi -->
                                    <div class="tab-pane fade in active" id="diri" role="tabpanel" aria-labelledby="diri-tab">
                                        <div class="row pt-2">
                                            <!-- detail data pribadi -->
                                            <div class="col-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="w-30">Nama Panggilan</th>
                                                            <td>:</td>
                                                            <td class="w-50"><?php echo $biodata->nama_panggilan ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Angkatan</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->angkatan ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Semester</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->semester ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nomor KTP</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->ktp ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nomor Telepon</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->no_telepon ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Asal SMA</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->asal_sma ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Sedang Menerima Beasiswa Lain</th>
                                                            <td>:</td>
                                                            <td><?php if ($biodata->beasiswa_lain == "1") { echo "Ya";} else {echo "Tidak";} ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nama Beasiswa</th>
                                                            <td>:</td>
                                                            <td><?php if ($biodata->beasiswa_lain == "0") { echo "-";} else {echo $beasiswa->nama_beasiswa;} ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nilai Beasiswa</th>
                                                            <td>:</td>
                                                            <td><?php if ($biodata->beasiswa_lain == "0") { echo "-";} else {echo $beasiswa->nilai_beasiswa;} ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- panel data orang tua -->
                                    <div class="tab-pane fade" id="ortu" role="tabpanel" aria-labelledby="ortu-tab">
                                        <div class="row pt-2">
                                            <div class="col-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="w-30">Nomor Telepon Orang Tua</th>
                                                            <td>:</td>
                                                            <td class="w-50"><?php echo $biodata->telepon_ortu ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Pekerjaan Orang Tua</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->pekerjaan_ortu ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Penghasilan Orang Tua</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->penghasilan_ortu ?? '' ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>    
                                    </div>
                                    <!-- panel data tempat tinggal -->
                                    <div class="tab-pane fade" id="rumah" role="tabpanel" aria-labelledby="rumah-tab">
                                        <div class="row pt-2">
                                            <div class="col-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="w-30">Link Google Map Rumah</th>
                                                            <td>:</td>
                                                            <td class="w-50"><a href="<?php echo $biodata->link_google_map ?? '' ?>" target="_blank" rel="noopener noreferrer"><?php echo $biodata->link_google_map ?? '' ?></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status rumah</th>
                                                            <td>:</td>
                                                            <td><?php echo $biodata->status_rumah ?? '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Foto rumah</th>
                                                            <td>:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center">
                                                                <!-- show foto_rumah if exist -->
                                                                <?php if (isset($biodata->foto_rumah)) : ?>
                                                                <img src="<?php echo base_url('images/rumah/' .$biodata->foto_rumah) ?>" width="500" height="300">
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                    </div>
                                    <!-- panel cerita anda -->
                                    <div class="tab-pane fade" id="cerita" role="tabpanel" aria-labelledby="cerita-tab">
                                        <div class="row pt-2">
                                            <div class="col-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr class="d-flex">
                                                            <th scope="row">Kegiatan selain kuliah</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->kegiatan_selain_kuliah ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Organisasi yang (pernah) diikuti</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->organisasi ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Kehidupan sehari-hari saat ini</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->kehidupan_sehari_hari ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Keluarga Anda</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->cerita_keluarga ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Dampak wabah COVID-19 yang dialami</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->dampak_covid ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Apa yang akan dicapai dalam 5 tahun ke depan</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->capaian_ke_depan ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Apa yang akan dilakukan untuk ITS ketika sudah menjadi alumni</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php echo $biodata->ketika_menjadi_alumni ?? '' ?></td>
                                                        </tr>
                                                        <tr class="d-flex">
                                                            <th scope="row">Bersedia terlibat dalam kegiatan alumni teknik informatika ITS</th>
                                                            <td class="pl-2">:</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-justify"><?php if ($biodata->bersedia_kegiatan_alumni == "1") { echo "Ya";} else {echo "Tidak";} ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
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