
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
			<a class="collapse-item" href="<?= base_url('kompetensi_dasar'); ?>">Kompetensi Dasar</a>
			<a class="collapse-item" href="<?= base_url('nilai_sikap'); ?>">Nilai Sikap</a>
			<a class="collapse-item" href="<?= base_url('nilai_pengetahuan'); ?>">Nilai Pengetahuan</a>
			<a class="collapse-item" href="<?= base_url('nilai_keterampilan'); ?>">Nilai Keterampilan</a>
		</div>
	</div>
</li>