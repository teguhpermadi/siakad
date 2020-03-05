<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>
	<?php echo $this->session->flashdata('message');?>

	<!-- title -->
	<div class="row mb-4">
		<div class='col-12'>
			<!-- cek datanya jika kosong -->
			<?php if($num_rows == 0): ?>
			<div class="alert alert-danger" role="alert">
				<p>Anda belum memasukan profil sekolah.</p><a href='<?= base_url('profil/add'); ?>' class='btn btn-primary'>Profil Sekolah</a>
			</div>
			<?php endif; ?>

			<!-- cek data tahun pelajaran -->
			<?php if($tahun_pelajaran == null): ?>
			<div class="alert alert-danger" role="alert">
				<p>Anda belum memasukan data Tahun Pelajaran.</p><a href='<?= base_url('tahun_pelajaran'); ?>' class='btn btn-primary'>Tahun Pelajaran</a>
			</div>
			<?php endif; ?>
			<?php foreach($profil as $p) {?>
			<div class="card">
				<div class="card-body">
					<p>
						<img src="https://picsum.photos/200" class='img-thumbnail float-left mr-4 mt-4' />
						<ul class="list-unstyled">
							<li>
								<h3 class="text-primary">Sistem Informasi Akademik</h3>
							</li>
							<li>
								<h4 class="text-uppercase"><?= $p['namaSekolah']?></h4>
							</li>
							<li>Alamat: <?= $p['alamat']?></li>
							<li>Telp: <?= $p['telp']?></li>
							<li>Email: <?= $p['email']?></li>
							<li>Website: <?= $p['website']?></li>
							<li><a href="<?php echo site_url('profil/edit/'.$p['id']); ?>" class="btn btn-primary">Edit
									Profil</a></li>
						</ul>
					</p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- card jumlah siswa -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_siswa; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- card jumlah guru -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Guru</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_guru; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-chalkboard-teacher fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- card jumlah kelas dan rombel -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kelas dan Rombel
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Mata Pelajaran
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-book fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- content row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2019</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
