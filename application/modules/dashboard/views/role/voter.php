<!DOCTYPE html>
<html lang="en">

<div class="container-fluid">
	<div class="col-md-12 col-lg-12">
		<h1><p style="color:#092147">Pendaftar</p></h1>
    </div>
	<form role="form" method="POST" class="px-3">
		<div class = "row">
			<div class="col-md-12 col-lg-2">
					<select class="form-control" name="tahun">
						<?php foreach($distinct as $row)
						{ 
							echo '<option value="'.$row->tahun.'">'.$row->tahun.'</option>';
						}
						?>
					</select>
			</div>
			<div class="col-md-12 col-lg-2">
				<select class="form-control" name="periode">
					<?php foreach($distinct as $row)
					{ 
						echo '<option value="'.$row->periode.'">'.$row->periode.'</option>';
					}
					?>
				</select>
			</div>			
			<div class="col-md-12 col-lg-1">
				<input class="btn btn-primary float-left" id="formSubmit" type="submit" name="getRecords" value="Tampil" />
			</div>
		</div>
	</form>
	<br>
    <?php 
        $items = array();
        foreach($calon as $calon) {
            if ($calon->user_id == $this->session->userdata('user_id'))
            {
                $items[] = $calon->pendaftar_id;
            }
        }
    ?>

    <?php 
        $limit = array();
        foreach($jumlah as $jumlah) {
            if ($jumlah->user_id == $this->session->userdata('user_id'))
            {
                $limit[] = $jumlah->pendaftar_id;
            }
        }
    ?>

    <div class="col-md-12 col-lg-12">
		<p style="color:#092147">Kuota vote: <?php echo $beasiswa->kuota_vote?> </p>
        <p style="color:#092147">Telah divote: <?php echo count($limit)?> </p>
    </div>

    <!-- DataTables -->
    <form action="<?= site_url('dashboard/calon/add_calon') ?>" role="form" method="POST">
        <div class="card mb-3 mx-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>Username</th>
                                <th>NRP</th>
                                <th>Nama Lengkap</th>
                                <th>Penghasilan Orang Tua</th>
                                <th>UKT</th>
                                <th>IPK</th>
                                <th>Aksi</th>
                                <th class="table-active" style="text-align: center">Vote</th>							
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $pendaftar): ?>
                                <tr>
									<td>
                                        <?php echo $pendaftar->username ?>
                                    </td>
                                    <td>
                                        <?php echo $pendaftar->nrp ?>
                                    </td>
                                    <td>
                                        <?php echo $pendaftar->nama_lengkap ?>
                                    </td>
                                    <td>
                                        <?php echo $pendaftar->penghasilan_ortu ?>
                                    </td>
                                    <td>
                                        <?php echo $pendaftar->ukt ?>
                                    </td>
                                    <td>
                                        <?php echo $pendaftar->ipk ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('dashboard/biodata/index/'.$pendaftar->biodata_id) ?>" role="button" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                    <td class="table-active" style="text-align: center">
                                        <input type="checkbox" name="pendaftar_id[]" value="<?php echo $pendaftar->pendaftar_id; ?>" <?php if($pendaftar->status == 'Ditutup' || in_array($pendaftar->pendaftar_id, $items)){echo'checked disabled';} ?>>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary btn-sm float-right <?php echo $beasiswa->kuota_vote == count($limit) ? 'btn-secondary disabled': 'btn-primary' ?>" type="submit" name="save_vote" value="Submit" />
            </div>
        </div>
    </form>

</div>
</html>