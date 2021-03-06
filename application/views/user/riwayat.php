<section class="mt-5 mr-5 ml-5">
	<div class="text-center">
		<h1><i>Riwayat Booking</i></h1>
	</div>
	<hr>
	<table class="table table-striped">
		<tbody>
			<tr>
				<th>Nama Booking</th>
				<th>Nama Paket</th>
				<th>Tanggal Booking</th>
				<th>Tanggal Makeup</th>
				<th>Harga</th>
				<th>Tarif</th>
				<th>Dp</th>
				<th>Sisa Pembayaran setelah selesai makeup </th>
				<th>Total Pembayaran</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
			<?php foreach ($booking as $bk) : ?>
				<?php $a = $bk->harga_paket + $bk->tarif ?>
				<?php $b = $bk->harga_paket + $bk->tarif - $bk->dp ?>
				<tr>
					<td><?php echo $bk->nama_booking ?></td>
					<td><?php echo $bk->nm_paket ?> - <?php echo $bk->nm_makeup ?></td>
					<td><?php echo date('d-m-Y', strtotime($bk->tgl_booking)) ?></td>
					<td><?php echo date('d-m-Y', strtotime($bk->tgl_makeup)) ?></td>
					<td>Rp. <?php echo number_format($bk->harga_paket, '0', ',', '.') ?></td>
					<td>Rp. <?php echo number_format($bk->tarif, '0', ',', '.') ?></td>
					<td>Rp. <?php echo number_format($bk->dp, '0', ',', '.') ?></td>
					<td>Rp. <?php echo number_format($b, '0', ',', '.') ?></td>
					<td>Rp. <?php echo number_format($a, '0', ',', '.') ?></td>
					<td><?php echo $bk->alamat_booking ?></td>
					<td>
						<?php
						if ($bk->hangus == "1") {
						?>
							<div class="alert alert-danger text-center" role="alert">
								Transaksi Anda Dibatalkan, karena terlambat waktu pembayaran
							</div>
							<?php
						} else {

							if ($bk->status == "Belum Bayar DP") {
							?>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihat<?php echo $bk->id_booking ?>">Silahkan Lakukan Pembayaran</button>
							<?php } elseif ($bk->status == "Menunggu Konfirmasi") { ?>
								<div class="alert alert-warning text-center" role="alert">
									Menunggu Konfirmasi
								</div>
							<?php } elseif ($bk->status == "Sudah Lunas") { ?>
								<div class="alert alert-info text-center" role="alert">
									Booking Diterima
								</div>
							<?php } elseif ($bk->status == "Dibatalkan") { ?>
								<div class="alert alert-danger text-center" role="alert">
									Booking Ditolak | Hubungi Kami
								</div>
						<?php }
						} ?>
					</td>
				</tr>
				<div class="modal fade" id="lihat<?php echo $bk->id_booking ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo base_url('pembayaran') ?>" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="id_booking" value="<?php echo $bk->id_booking ?>">
									<div class="form-group">
										<label for="">Nama</label>
										<input type="text" name="nama" class="form-control">
									</div>
									<div class="form-group">
										<label for="">pilih Bank</label>
										<select name="bank" id="" class="form-control">
											<option value="BNI">BNI - 0900335784 an/Ratih Wahyuni Islami</option>
											<option value="BRI">BRI - 7241 01 010515 53 9 an/Ratih Wahyuni Islami</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Bukti</label>
										<input type="file" name="bukti_foto" class="form-control">
									</div>
									<button class="btn btn-primary" type="submit">Simpan Pembayaran</button>
								</form>
							</div>
							<div class="text-center">
	                     	<h6><i>Batas Pembayaran Dp dalam waktu 12 jam, jika lewat maka booking Hangus dan bisa ulang pemesanan lagi</i></h6>
                     	</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</tbody>
	</table>
	<hr>
</section>
