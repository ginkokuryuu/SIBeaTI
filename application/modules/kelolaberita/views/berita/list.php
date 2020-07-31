<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        th, .td-center {
            text-align: center;
        }
    </style>
</head>
<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pengelolaan Berita</p></h1>
    </div>

    <!-- DataTables -->
    <form action="" role="form" method="POST">
        <div class="card my-4 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolaberita/berita/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
								<th>Judul Berita</th>
                                <th>Isi Berita</th>
                                <th>Tanggal Berita</th>
                                <th>Attachment</th>
                                <th>Aksi</th>							
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($berita as $key => $berita): ?>
                                <tr>
                                    <td class="td-center">
                                        <?php echo $key + 1 ?>
                                    </td>
									<td>
                                        <?php echo $berita->judul ?>
                                    </td>
                                    <td>
                                        <?php echo $berita->isi_berita ?>
                                    </td>
                                    <td class="td-center">
                                        <?php echo date ("d-m-Y h:i A", strtotime($berita->tanggal_berita)) ?>
                                    </td>
                                    <td class="td-center">
                                        <?php if (isset($berita->attachment)) : ?>
                                        <a href="<?php echo site_url('download/index/'.$berita->attachment) ?>"><?php echo $berita->attachment ?></a>
                                        <?php else : ?>
                                        -
                                        <?php endif; ?>
                                    </td>
                                    <td class="td-center">
                                        <a href="<?php echo site_url('kelolaberita/berita/edit/'.$berita->berita_id) ?>" class="btn btn-sm"><i class="fas fa-edit"></i> Edit</a>
										<a onclick="deleteConfirm('<?php echo site_url('kelolaberita/berita/delete/'.$berita->berita_id) ?>')" href="#!" class="btn btn-sm text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

</div>
</html>