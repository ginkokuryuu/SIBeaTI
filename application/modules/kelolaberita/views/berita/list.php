<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pengelolaan Berita</p></h1>
    </div>

    <!-- DataTables -->
    <form action="" role="form" method="POST">
        <div class="card mb-3 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolaberita/berita/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>Judul Berita</th>
                                <th>Isi Berita</th>
                                <th>Tanggal Berita</th>
                                <th>Aksi</th>							
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($berita as $berita): ?>
                                <tr>
									<td>
                                        <?php echo $berita->judul ?>
                                    </td>
                                    <td>
                                        <?php echo $berita->isi_berita ?>
                                    </td>
                                    <td>
                                        <?php echo $berita->tanggal_berita ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('kelolaberita/berita/edit/'.$berita->berita_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
										<a onclick="deleteConfirm('<?php echo site_url('kelolaberita/berita/delete/'.$berita->berita_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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