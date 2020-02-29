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
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
		aria-controls="collapseTwo">
		<i class="fas fa-database"></i>
		<span>Data Akademik</span>
	</a>
	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="<?= base_url('siswa'); ?>">Siswa</a>
			<a class="collapse-item" href="<?= base_url('kelas'); ?>">Kelas</a>
			<a class="collapse-item" href="<?= base_url('rombel'); ?>">Rombel</a>
			<a class="collapse-item" href="<?= base_url('walikelas'); ?>">Walikelas</a>
			<a class="collapse-item" href="<?= base_url('guru'); ?>">Guru</a>
			<a class="collapse-item" href="<?= base_url('mapel'); ?>">Mata Pelajaran</a>
			<a class="collapse-item" href="<?= base_url('pengajar'); ?>">Pengajar</a>
		</div>
	</div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
	<a class="nav-link" href="<?= base_url('users'); ?>">
		<i class="fas fa-users-cog"></i>
		<span>Data Pengguna</span></a>
</li>