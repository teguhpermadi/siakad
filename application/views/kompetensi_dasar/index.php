<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kompetensi Dasar</h1>
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
			<div class="col-md-12 mb-3">
				<div class="card border-left-info">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-primary text-uppercase mb-1"><?= $m['nama_mapel']; ?>
								</div>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href='<?= base_url('kompetensi_dasar/add/'.$m['id_mapel']) ?>' type="button" class="btn btn-info">Tambah KD</a>
									<button type="button" class="btn btn-info">Download Excel</button>
									<button type="button" class="btn btn-info">Upload Excel</button>
									<button type="button" class="btn btn-info">Cetak KD</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<?php 
			$tingkat = $this->Kompetensi_dasar_model->get_tingkat($m['id_mapel']);
			echo($tingkat == null ? '<div class="col-md-12"><div class="alert alert-danger" role="alert">Belum ada Kompetensi Dasar untuk mata pelajaran ini.</div></div>' : '');
				foreach ($tingkat as $t) {
			?>
			<!-- tampilkan kd tiap tingkat kelasnya -->
			<div class="col-md-6 mb-3">
				<div class="card">
					<div class="card-header">
						<?= $t['tingkat']; ?>
					</div>
					<div class="card-body">
						<table class="table table-hover table-light table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col" width="80%">Deskripsi KD</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- dapatkan kd pada masing2 mapel dan tingkat -->
								<?php
									$no = 1;
									$kd = $this->Kompetensi_dasar_model->get_kd($m['id_mapel'], $t['tingkat']);
									foreach ($kd as $k) {
									?>
								<tr>
									<th scope="row"><?= $no++; ?></th>
									<td><?= $k['kd']; ?></td>
									<td>
										<a class='btn btn-sm btn-warning mb-1' href="<?= base_url('kompetensi_dasar/edit/'.$k['id']); ?>">Edit</a>
										<a class='btn btn-sm btn-danger mb-1' href="<?= base_url('kompetensi_dasar/remove/'.$k['id']); ?>">Hapus</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php }; } ?>
	<!-- content row -->

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