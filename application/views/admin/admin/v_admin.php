<div class="container">
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="mb-4">
		<button data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Data Admin</button>
	</div>
	<table class="table table-striped" id="dataTable">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Username</th>
				<th scope="col">Nama Admin</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($admin as $no => $adm) {
			?>
				<tr>
					<th scope="row"><?php echo $no + 1; ?></th>
					<td><?php echo $adm->username ?></td>
					<td><?php echo $adm->nama_admin ?></td>
					<td style="width: 20%;"><a href="<?php echo base_url('admin/admin_edit/') . $adm->id_admin ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url('admin/admin_hapus/') . $adm->id_admin ?>" class="btn btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- Modal Tambah-->
	<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Data Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('admin/admin_tambah') ?>" method="POST">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Nama Admin</label>
							<input type="text" name="nama_admin" class="form-control">
						</div>
						<button class="btn btn-primary" type="submit">Simpan Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
