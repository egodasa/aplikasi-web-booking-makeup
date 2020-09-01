<div class="container">
	<?php echo $this->session->flashdata('pesan') ?>
	<table class="table table-striped" id="dataTable">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
				<th scope="col">No HP</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($user as $no => $ur) {
			?>
				<tr>
					<th scope="row"><?php echo $no + 1; ?></th>
					<td><?php echo $ur->username ?></td>
					<td><?php echo $ur->email ?></td>
					<td><?php echo $ur->nohp ?></td>
					<td style="width: 20%;"><a href="<?php echo base_url('admin/user_hapus/') . $ur->id_pengguna ?>" class="btn btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
