<section class="mt-3 mr-3 ml-3">
	<div class="container">
		<?php echo $this->session->flashdata('pesan') ?>
		<div class="mb-4">
			<button data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Data Tarif</button>
		</div>
		<table class="table table-striped" id="dataTable">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Kota</th>
					<th scope="col">Tarif Kota</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tarif as $no => $tr) : ?>
					<tr>
						<th scope="row"><?php echo $no + 1; ?></th>
						<td><?php echo $tr->nm_kota ?></td>
						<td>Rp. <?php echo number_format($tr->tarif, '0', ',', '.') ?></td>
						<td><a href="<?php echo base_url('admin/tarif_hapus/') . $tr->id_kota ?>" class="btn btn-sm btn-danger">Hapus</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tarif</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('admin/tarif_tambah') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Nama Paket</label>
							<input type="text" name="nm_kota" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Tarif</label>
							<input type="text" name="tarif" class="form-control">
						</div>
						<button class="btn btn-primary" type="submit">Simpan Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
