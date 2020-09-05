<body>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center">

			<h1 class="logo mr-auto"><a href="#">Ratih MakeUp</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li class="active"><a href="<?php echo base_url('user/index') ?>">Beranda</a></li>
					<li><a href="<?php echo base_url('karya') ?>">Hasil Karya</a></li>
					<li><a href="<?php echo base_url('biodata') ?>">Biodata</a></li>
					<?php if (!$this->session->userdata('username')) { ?>
						<li><a href="<?php echo base_url('register') ?>">Daftar</a></li>
				</ul>
			</nav>
			<button class="get-started-btn scrollto" type="button" data-toggle="modal" data-target="#login">Masuk</button>
		<?php } else { ?>
			<li><a href="<?php echo base_url('riwayat') ?>">Riwayat Booking</a></li>
			<a href="<?php echo base_url('logout') ?>" class="get-started-btn scrollto" style="color: white;">Keluar</a>
		<?php } ?>
		</div>

		<!-- Modal -->

	</header><!-- End Header -->
	<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Masukkan Username & Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('login') ?>" method="POST">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-primary" type="submit">Masuk</button>
					</form>
				</div>
			</div>
		</div>
	</div>
