<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?= base_url('dashboard'); ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-school"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SIAKAD</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<?php user_menu(); ?>

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

					<!-- tahun pelajaran aktif -->
					<div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
						<h3 class="text-primary font-weight-bold">
							<i class="far fa-calendar-check"></i>
							<span>Tahun Pelajaran <?= $_SESSION['tahun']; ?> (<?= $_SESSION['semester']; ?>)</span>
						</h3>

					</div>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Search for..." aria-label="Search"
											aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Alerts -->

						<!-- <li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle text-gray-600" href="#" id="alertsDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="far fa-calendar-alt"></i>
								<span class="ml-2">Ubah Tahun Pelajaran</span>
							</a> -->
						<!-- Dropdown - Alerts -->
						<!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Pilih tahun pelajaran
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									2018/2019
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									2019/2020
								</a>
							</div>
						</li> -->

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span
									class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user_info()['first_name']; ?></span>
								<img class="img-profile rounded-circle" src="https://picsum.photos/200">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profil
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Pengaturan
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
