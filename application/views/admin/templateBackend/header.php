<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Blank</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/assetsbe') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/assetsbe') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/assetsbe') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
	<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

</head>

<body id="page-top">
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
