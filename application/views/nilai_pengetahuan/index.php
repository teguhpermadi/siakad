<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Nilai Pengetahuan</h1>
	</div>

	<?php if(empty($mapel)){ ?>
	<!-- jika data mapelnya kosong -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger fade show" role="alert">
				Tidak ada mata pelajaran yang Anda ajar, silahkan hubungi Administrator.
			</div>
		</div>
	</div>
	<?php } else { 
            foreach($mapel as $m) { 
		?>
	<div>
	<!-- tampilkan nama mapelnya -->
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info fade show" role='alert'>
					<h4 class='text-uppercase'><?= $m['nama_mapel']; ?></h4>
				</div>
			</div>
		</div>
		<div class="row">
		<!-- tampilkan kelasnya -->
			<?php 
			$kelas = $this->Nilai_pengetahuan_model->get_kelas($m['id_mapel']);
			foreach($kelas as $k) { ?>
				<div class="col-md-6">
					<div class="card shadow mb-4">
						<div class="card-header">
							<span class='text-uppercase'>kelas <?= $k['nama_kelas']; ?></span>
							<!-- jika user adalah walikelasnya -->
							<?php 
							if($k['id_kelas'] == user_info()['id_kelas'])
							{
								echo '<span class="badge badge-primary float-right">Walikelas</span>';
							}
							?>
						</div>
						<div class="card-body">
						
						</div>						
						<div class="card-footer">
							<a href="<?= base_url('nilai_pengetahuan/do_nilai/').$m['id_mapel'].'-'.$k['id_kelas']; ?>" class='btn btn-primary'>Lakukan Penilaian</a>
							<a href="<?= base_url('nilai_pengetahuan/cetak/').$m['id_mapel'].'-'.$k['id_kelas']; ?>" class='btn btn-primary float-right'>Cetak Penilaian</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php }; } ?>
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
