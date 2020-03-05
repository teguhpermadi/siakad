<style>
	.area {
		/* background: white; */
		height: 250px;
		overflow: auto;
	}

</style>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Rombongan Belajar</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<a href="<?= base_url('rombel/add'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah rombel</span>
			</a>
		</div>
	</div>

	<!-- flash data -->
	<?php if($this->session->flashdata('berhasil')) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('hapus')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('hapus'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('berhasil_upload')) { ?>
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil_upload'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- content row -->

	<div class="row">
		<?php foreach($get_kelas_by_tahun as $k) {?>
		<div class="col-sm-4 mb-3">
			<div class="card shadow">
				<div class="card-body">
					<h3 class="card-title text-uppercase text-primary font-weight-bolder"><?= $k['nama'] ?></h3>
					<?php 
						$siswa = $this->Rombel_model->get_siswa_by_id_kelas($k['id_kelas']);
						$jml_siswa = $this->Rombel_model->count_siswa_by_id_kelas($k['id_kelas']);
						$jml_siswa_laki = $this->Rombel_model->count_siswa_laki_by_id_kelas($k['id_kelas']);
						$jml_siswa_perempuan = $this->Rombel_model->count_siswa_perempuan_by_id_kelas($k['id_kelas']);
					?>
					<p class="card-text">Jumlah siswa: <?= $jml_siswa; ?> orang.<br>Laki-laki:
						<?= $jml_siswa_laki; ?> orang<br>Perempuan: <?= $jml_siswa_perempuan; ?> orang.</p>
					<ul class="list-group mb-3 area">
						<?php foreach($siswa as $s) { ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<?= $s['nama_lengkap'] ?>
							<span class="badge badge-info badge-pill"><?= $s['nama_panggilan'] ?></span>
						</li>
						<?php } ?>
					</ul>
					<a href="<?= base_url('rombel/edit_rombel/'.$k['id_kelas']); ?>" class="btn btn-primary">Edit
						Kelas</a>
					<!-- Default dropup button -->
					<div class="btn-group dropup">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							Pilihan
						</button>
						<div class="dropdown-menu">
							<!-- Dropdown menu links -->
							<a href="#" class='dropdown-item'>Cetak absensi kelas</a>
							<a href="#" class='dropdown-item'>Hapus kelas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>


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

<script>
	let scrollDiv = document.querySelector(".area");
	SimpleScrollbar.initEl(scrollDiv);

</script>
