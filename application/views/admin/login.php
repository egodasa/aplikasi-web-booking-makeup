<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Login</title>
	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/assetsbe') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/assetsbe') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/assetsbe') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
	<?php
	if ($this->session->flashdata('pesan') == TRUE) {
		$pesan = $this->session->flashdata('pesan');
	?>
		<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
		<script type="text/javascript">
			Swal.fire(
				'Berhasil!',
				'<?= $pesan ?>',
				'success'
			)
		</script>
	<?php }
	if ($this->session->flashdata('error') == TRUE) {
		$error = $this->session->flashdata('error');
	?>
		<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
		<script type="text/javascript">
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: '<?= $error ?>'
			})
		</script>
	<?php
	}
	?>
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center" style="margin-top: 10rem;">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block">
								<img src="<?php echo base_url('assets/upload/logomu.jpg') ?>" class="img-fluid" alt="">
							</div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
									</div>
									<form class="user" action="<?php echo base_url('admin/login_aksi') ?>" method="POST">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." name="username">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
										</div>
										<hr>
										<button class="btn btn-sm btn-primary" type="submit" class="form-control">Masuk</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/assetsbe') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/assetsbe') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/assetsbe') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/assetsbe') ?>/js/sb-admin-2.min.js"></script>

	<script src="<?= base_url('assets/assetsbe') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/assetsbe') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?= base_url('assets/assetsbe') ?>/js/demo/datatables-demo.js"></script>

</body>

</html>
