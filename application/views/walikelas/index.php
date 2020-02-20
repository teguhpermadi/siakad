<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Walikelas</h1>
	</div>
	

	<div class="row mb-4">
		<div class="col">
			<a href='<?= base_url('walikelas/add'); ?>' class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah walikelas</span>
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

	<div class="row">
		<div class='col-md-12'>
			<div class="card">

				<div class="card-body">
					<table id="datatable-walikelas" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Kelas</th>
								<th>Walikelas</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($walikelas as $w) {?>
							<tr>
								<td><?= $w['nama_kelas']; ?></td>
								<td><?= $w['nama_guru']; ?></td>
								<td>
									<a href="<?php echo site_url('walikelas/edit/'.$w['id']); ?>"
										class="btn btn-info btn-sm">Edit</a>
									<a href="<?php echo site_url('walikelas/remove/'.$w['id']); ?>"
										class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							<?php }?>
						</tbody>
						<tfoot>
							<tr>
								<th>Kelas</th>
								<th>Walikelas</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
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
