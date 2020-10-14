<?php echo $this->session->flashdata('pesan') ?>
<div class="mt-5 mr-2 ml-2 table-responsive">
	<div class="table-responsive" style="overflow-x:scroll;width:150em">
		<table class="table table-striped" id="dataTable">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">NoHP</th>
					<th scope="col">Nama Paket</th>
					<th scope="col">Tanggal Booking</th>
					<th scope="col">Alamat Booking</th>
					<th scope="col">Tanggal Makeup</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Dp</th>
					<th scope="col">Harga Paket</th>
					<th scope="col">Tarif</th>
					<th scope="col">Sisa Bayar</th>
					<th scope="col">Total Bayar</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($booking as $no => $bk) :
				?>
					<tr>
						<?php $total = $bk->harga_paket + $bk->tarif; ?>
						<?php $sisa_bayar = $bk->harga_paket + $bk->tarif - $bk->dp ?>
						<th scope="row"><?php echo $no + 1; ?></th>
						<td><?php echo $bk->nama ?></td>
						<td><?php echo $bk->nohp ?></td>
						<td><?php echo $bk->nm_makeup ?> - <?php echo $bk->nm_paket ?></td>
						<td><?php echo date('d-m-Y', strtotime($bk->tgl_booking)) ?></td>
						<td><?php echo $bk->alamat_booking ?></td>
						<td><?php echo date('d-m-Y', strtotime($bk->tgl_makeup)) ?></td>
						<td><?php echo $bk->keterangan ?></td>
						<td>Rp. <?php echo number_format($bk->dp, '0', ',', '.') ?></td>
						<td>Rp. <?php echo number_format($bk->harga_paket, '0', ',', '.') ?></td>
						<td>Rp. <?php echo number_format($bk->tarif, '0', ',', '.') ?></td>
						<td>Rp. <?php echo number_format($sisa_bayar, '0', ',', '.')  ?></td>
						<td>Rp. <?php echo number_format($total, '0', ',', '.')  ?></td>
						<td style="width: 10%;">
							<div class="row">
								<?php
								if ($bk->status_bukti == "Menunggu Konfirmasi") {
								?>
									<div class="alert alert-warning text-center" role="alert">
										Menunggu Konfirmasi
									</div>
								<?php } elseif ($bk->status_bukti == "Pembayaran Diterima") { ?>
									<div class="alert alert-info text-center" role="alert">
										Pembayaran Diterima
									</div>
								<?php } else { ?>
									<div class="alert alert-danger text-center" role="alert">
										Pembayaran Ditolak
									</div>
								<?php } ?>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?php echo $bk->id_bukti ?>"><i class="fas fa-eye"></i></button>
							</div>
						</td>
					</tr>
					<!-- Modal -->
					<div class="modal fade" id="detail<?php echo $bk->id_bukti ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-center">
									<div class="container">
										<img src="<?php echo base_url() . './assets/upload/' . $bk->bukti_foto ?>" class="img-fluid" alt="">
										<form action="<?php echo base_url('konfirmasi') ?>" method="POST">
											<div class="form-group">
												<input type="hidden" name="id_booking" value="<?php echo $bk->id_booking ?>">
												<label for="">Pilih Aksi</label>
												<select name="status_bukti" id="" class="form-control">
													<option value="Pembayaran Diterima">Pembayaran Diterima</option>
													<option value="Pembayaran Ditolak">Pembayaran Ditolak</option>
												</select>
											</div>
											<button class="btn btn-primary" type="submit">Simpan</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- Modal -->
</div>