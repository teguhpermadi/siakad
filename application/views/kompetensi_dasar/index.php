<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kompetensi Dasar</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<a href="<?= base_url('kompetensi_dasar/add'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah KD</span>
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

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Daftar kelas</h6>
		</div>
		<div class="card-body">
			<table id="datatable-kelas" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Id Mapel</th>
						<th>Id Kelas</th>
						<th>Kd</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($kompetensi_dasar as $kd){ ?>
					<tr>
						<td><?php echo $kd['id_mapel']; ?></td>
						<td><?php echo $kd['id_kelas']; ?></td>
						<td><?php echo $kd['kd']; ?></td>
						<td>
							<a href="<?php echo site_url('kompetensi_dasar/edit/'.$kd['id']); ?>"
								class="btn btn-info btn-xs">Edit</a>
							<a href="<?php echo site_url('kompetensi_dasar/remove/'.$kd['id']); ?>"
								class="btn btn-danger btn-xs">Delete</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Id Mapel</th>
						<th>Id Kelas</th>
						<th>Kd</th>
						<th>Actions</th>
					</tr>
				</tfoot>
			</table>
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