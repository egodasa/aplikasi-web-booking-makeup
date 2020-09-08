<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Document</title>
</head>

<body>
	<div class="container">
		<div class="text-center mt-5 mb-5">
			<h3>Laporan Booking</h3>
			<hr>
			<h5>Ratih Makeup Arts</h5>
		</div>
		<table class="table table-striped" id="dataTable">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Customers</th>
					<th scope="col">Paket Makeup</th>
					<th scope="col">Alamat</th>
					<th scope="col">Total Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$jumlahPendapatan = 0;
					foreach ($laporan as $no => $lp)
					{
						$totalBayar = $lp->tarif + $lp->harga_paket;
						$jumlahPendapatan += $totalBayar;
				?>
					<tr>
						<th scope="row"><?php echo $no + 1; ?></th>
						<td><?php echo $lp->nama_booking ?></td>
						<td><?php echo $lp->nm_paket ?></td>
						<td><?php echo $lp->alamat_booking ?></td>
						<td>Rp. <?php echo number_format($totalBayar, '0', ',', '.') ?>,00-</td>

					</tr>
				<?php } ?>
			</tbody>
			<thead>
				<tr>
					<th colspan="4" scope="col">Pendapatan</th>
					<th>Rp. <?php
							if ($jumlahPendapatan == 0) {
							?>
							,00-
						<?php } else { ?>
							<?php echo number_format($jumlahPendapatan, '0', ',', '.')  ?>
						<?php } ?>
					</th>
				</tr>
			</thead>
		</table>
		<div class="row">
			<div class="col-md-3 offset-9 text-center">
				Pimpinan
				<br>
				<br>
				<br>
				<br>
				<br>
				Tanggal : <?= date("d-m-Y") ?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
