<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Daftar Pengajar</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<a href="<?= base_url('pengajar/add'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah pengajar</span>
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

	<!-- DataTales Example -->
	<div class="row">
    <!-- disini foreach nya -->
	<?php foreach($pengajar as $p){  ?>
		<div class="col-sm-6 mb-3">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary"><?= $p['nama_lengkap'] ?></h6>
				</div>
				<div class="card-body">
                <ul class="list-group mb-3 area">
					<?php 
						$mapel = $this->Pengajar_model->get_mapel_by_id_guru($p['id_guru']);
						// print_r($mapel);
						foreach($mapel as $m) {
						?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<?= $m['nama_mapel'] ?> - <?= $m['nama_kelas'] ?>
							<span class="badge badge-info badge-pill"><?= $m['kode_mapel'] ?></span>
						</li>
					<?php } ?>
					</ul>
					<a href="<?= base_url('pengajar/edit/'.$p['id_guru']); ?>" class="btn btn-primary">Edit Pengajar</a>
					
				</div>
			</div>
		</div>
    <?php } ?>
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
