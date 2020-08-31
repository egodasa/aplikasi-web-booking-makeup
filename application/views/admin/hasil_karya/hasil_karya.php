<div class="container">
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="mb-4">
		<button data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Data Karya</button>
	</div>
	<table class="table table-striped" id="dataTable">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Karya</th>
				<th scope="col">Deskripsi</th>
				<th scope="col">Foto</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($hasil_karya as $no => $hk) {
			?>
				<tr>
					<th scope="row"><?php echo $no + 1; ?></th>
					<td><?php echo $hk->nm_karya ?></td>
					<td><?php echo $hk->deskripsi ?></td>
					<td><?php echo $hk->foto ?></td>
					<td style="width: 20%;"><a href="<?php echo base_url('admin/karya_edit/') . $hk->id_karya ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url('admin/karya_hapus/') . $hk->id_karya ?>" class="btn btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- Modal Tambah-->
	<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Data Hasil Karya</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('admin/karya_tambah') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<select name="id_makeup" id="" class="form-control">
								<?php foreach ($makeup as $mu) : ?>
									<option value="<?php echo $mu->id_makeup ?>"><?php echo $mu->nm_makeup ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Nama Hasil Karya</label>
							<input type="text" name="nm_karya" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Deskripsi</label>
							<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="">Foto</label>
							<input type="file" name="foto" class="form-control">
						</div>
						<button class="btn btn-primary" type="submit">Simpan Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
