<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pengelolaan Beasiswa</p></h1>
    </div>

    <!-- DataTables -->
    <form action="" role="form" method="POST">
        <div class="card mb-3 mx-3">
            <div class="card-header">
                <a href="<?php echo site_url('kelolabeasiswa/beasiswa/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
							<tr>
								<th>Nama</th>
								<th>Tahun</th>
								<th>Periode</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($beasiswa as $beasiswa): ?>
								<tr>
									<td>
										<?php echo $beasiswa->nama ?>
									</td>
									<td>
										<?php echo $beasiswa->tahun ?>
									</td>
									<td>
										<?php echo $beasiswa->periode ?>
									</td>
									<td>
										<?php echo date("d-m-Y", strtotime($beasiswa->tanggal_mulai)) ?>
									</td>
									<td>
										<?php echo date("d-m-Y", strtotime($beasiswa->tanggal_selesai)) ?>
									</td>
									<td>
										<?php echo $beasiswa->status ?>
									</td>
                                    <td>
                                        <a href="<?php echo site_url('kelolabeasiswa/beasiswa/edit/'.$beasiswa->beasiswa_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
										<a onclick="deleteConfirm('<?php echo site_url('kelolabeasiswa/beasiswa/delete/'.$beasiswa->beasiswa_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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