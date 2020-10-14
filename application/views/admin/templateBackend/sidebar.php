<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-laugh-wink"></i>
			</div>
			<div class="sidebar-brand-text mx-3"><?php echo $_SESSION['nama_admin'] ?></div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<li class="nav-item <?= $this->uri->segment(2) == 'data' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('admin/data') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Admin </span></a>
		</li>
		<li class="nav-item <?= $this->uri->segment(2) == 'makeup' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('admin/makeup') ?>">
				<i class="fas fa-fw fa-shopping-cart"></i>
				<span>Make Up </span></a>
		</li>
		<li class="nav-item <?= $this->uri->segment(2) == 'paket' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('admin/paket') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Paket Make Up</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('admin/karya') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Hasil Karya</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('admin/tarif') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Tarif</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('admin/booking') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Jadwal Booking</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('admin/laporan') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Laporan</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('admin/user') ?>">
				<i class="fas fa-fw fa-table"></i>
				<span>User</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Topbar Search -->
				<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form> -->

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">
					<div class="topbar-divider d-none d-sm-block"></div>

					<!-- Nav Item - User Information -->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_admin']; ?></span>
							<img class="img-profile rounded-circle" src="<?php echo base_url('assets/upload/icon.jpg') ?>">
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('admin/Login/logout_aksi') ?>">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
							</a>
						</div>
					</li>

				</ul>

			</nav>
			<!-- End of Topbar -->
