<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Jadwal Pelajaran</h1>
	</div>

	<!-- flash data -->
	<?php if ($this->session->flashdata('berhasil')) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if ($this->session->flashdata('hapus')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('hapus'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if ($this->session->flashdata('berhasil_upload')) { ?>
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil_upload'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<div class="row mb-3">
		<div class="col">
			<a href="<?= base_url('jadwal_pelajaran/add'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah Jadwal</span>
			</a>
		</div>
	</div>

	<!-- DataTales Example -->
	<?php foreach ($kelas as $k) { ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?= $k['nama'] ?>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nama Mapel</th>
						<th>Actions</th>
					</tr>
				</thead>
					
			<?php 
			$mapel = $this->Jadwal_pelajaran_model->get_mapel_by_kelas($k['id']);
			foreach($mapel as $m){ ?>
				<tr>
					<td>
						<?= $m['nama_mapel'] ?>
					</td>
					<td>
						<a href="<?= base_url('jadwal_pelajaran/remove/'.$m['id_jadwal']); ?>"
							class="btn btn-danger btn-icon-split btn-sm">
							<span class="icon text-white-50">
								<i class="fas fa-book"></i>
							</span>
							<span class="text">Hapus</span>
						</a>
					</td>
				</tr>
			<?php } ?>

				<tfoot>
					<tr>
						<th>Nama Mapel</th>
						<th>Actions</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<?php } ?>
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
