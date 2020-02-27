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

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
	<a class="nav-link" href="<?= base_url('dashboard'); ?>">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
	Menu Administrator
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
	<a class="nav-link" href="<?= base_url('profil'); ?>">
		<i class="fas fa-school"></i>
		<span>Profil Sekolah</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
	<a class="nav-link" href="<?= base_url('tahun_pelajaran'); ?>">
		<i class="fas fa-calendar"></i>
		<span>Tahun Pelajaran</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
		aria-expanded="true" aria-controls="collapsePages">
		<i class="fas fa-folder-open"></i>
		<span>Hasil Penilaian</span>
	</a>
	<div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="#">Absensi</a>
			<a class="collapse-item" href="#">Catatan</a>
			<a class="collapse-item" href="#">Rapor</a>
		</div>
	</div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
	Menu Guru
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
		aria-expanded="true" aria-controls="collapsePages">
		<i class="fas fa-award"></i>
		<span>Penilaian</span>
	</a>
	<div id="collapseFour" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="#">Input Indikator</a>
			<a class="collapse-item" href="#">Input Nilai</a>
		</div>
	</div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
