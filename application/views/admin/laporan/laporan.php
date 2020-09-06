<div class="mt-5 mr-5 ml-5">
	<form action="" method="GET">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Dari Tanggal :</label>
						<input type="date" class="form-control" value="<?= $dari ?>" name="dari" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Sampai Tanggal :</label>
						<input type="date" class="form-control" value="<?= $sampai ?>" name="sampai" required>
						<input type="text" id="datepicker" class="form-control">
						<script>
							var picker = new Pikaday({
								disableDayFn: function(date) {
									var enabled_dates = ["2020-09-05"]; // dates I want to enabled.
									if ($.inArray(moment(date).format("YYYY-MM-DD"), enabled_dates) !== -1) {
										return true;
									} else {
										return false;
									}
								},
								field: document.getElementById('datepicker'),
								format: 'YYYY-MM-DD'
							});
						</script>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Nama Paket</label>
						<select name="paket" id="" class="form-control">
							<option value="">Semua Paket</option>
							<?php foreach ($daftar_paket as $pk) { ?>
								<option value="<?php echo $pk->id_paket ?>"><?php echo $pk->nm_makeup ?> - <?php echo $pk->nm_paket ?></option>
							<?php } ?>
						</select>
						<script>
							document.getElementsByName("paket")[0].value = "<?= $paket ?>";
						</script>
					</div>
				</div>
				<div class="col-md-1">
					<button id="show" class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i></button>
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
			<form action="<?php echo base_url('admin/print_laporan/') ?>" method="GET" target="_blank">
				<input type="hidden" value="<?= $dari ?>" name="dari">
				<input type="hidden" value="<?= $sampai ?>" name="sampai">
				<input type="hidden" value="<?= $paket ?>" name="paket">
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
						<td><?php echo $lp->nm_makeup ?> - <?php echo $lp->nm_paket ?></td>
						<td><?php echo date('d-m-Y', strtotime($lp->tgl_booking)) ?></td>
						<td>Rp. <?php echo number_format($totalBayar, '0', ',', '.') ?></td>
						<td><?php echo $lp->alamat_booking ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
