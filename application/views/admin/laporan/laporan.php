<div class="mt-5 mr-5 ml-5">
	<form action="<?php echo base_url('admin/filter_laporan') ?>" method="GET">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Dari Tanggal :</label>
						<input type="date" class="form-control" name="dari" required>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Sampai Tanggal :</label>
						<input type="date" class="form-control" name="sampai" required>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<button id="show" class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<hr>
	<!-- <script>
		$('#show').focus(function(e) {
			$('#tabel').show();
		});
	</script> -->
	<div>
		<div class=" mb-3">
			<form action="<?php echo base_url('admin/print_laporan/') ?>" method="POST">
				<input type="hidden" value="<?= @$_GET['dari'] ?>" name="dari1">
				<input type="hidden" value="<?= @$_GET['sampai'] ?>" name="sampai1">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-print"></i> Print Laporan</button>
			</form>
		</div>
		<table class="table table-striped" id="dataTable">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Customers</th>
					<th scope="col">Paket Makeup</th>
					<th scope="col">Tanggal Booking</th>
					<th scope="col">Total Bayar</th>
					<th scope="col">Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($laporan as $no => $lp) : ?>
					<?php $totalBayar = $lp->tarif + $lp->harga_paket ?>
					<tr>
						<th scope="row"><?php echo $no + 1; ?></th>
						<td><?php echo $lp->nama_booking ?></td>
						<td><?php echo $lp->nm_paket ?></td>
						<td><?php echo date('d-m-Y', strtotime($lp->tgl_booking)) ?></td>
						<td>Rp. <?php echo number_format($totalBayar, '0', ',', '.') ?></td>
						<td><?php echo $lp->alamat_booking ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
