<div class="container">
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="mb-4">
		<button data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Data Makeup</button>
	</div>
	<table class="table table-striped" id="dataTable">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Makeup</th>
				<th scope="col">Deskripsi</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($makeup as $no => $mu) {
			?>
				<tr>
					<th scope="row"><?php echo $no + 1; ?></th>
					<td><?php echo $mu->nm_makeup ?></td>
					<td><?php echo $mu->deskripsi ?></td>
					<td style="width: 20%;"><a href="<?php echo base_url('admin/makeup_edit/') . $mu->id_makeup ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url('admin/makeup_hapus/') . $mu->id_makeup ?>" class="btn btn-danger">Hapus</a></td>
					<td><button class="btn btn-primary" data-toggle="modal" data-target="#id<?php echo $mu->id_makeup ?>" type="button">edit</button></td>
				</tr>
				<!-- Modal -->
				<div class="modal fade" id="id<?php echo $mu->id_makeup ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<?php echo $mu->id_makeup ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</tbody>
	</table>

	<!-- Modal Tambah-->
	<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Data Make Up</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('admin/makeup_tambah') ?>" method="POST">
						<div class="form-group">
							<label for="">Nama MakeUp</label>
							<input type="text" name="nm_makeup" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Deskripsi MakeUp</label>
							<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
						</div>
						<button class="btn btn-primary" type="submit">Simpan Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
