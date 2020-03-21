<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Guru</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<a href="<?= base_url('guru/add'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah Guru</span>
			</a>
			<button class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#formUpload">
				<span class="icon text-white-50">
					<i class="fas fa-upload"></i>
				</span>
				<span class="text">Upload Guru</span>
			</button>

			<button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteAll">
				<span class="icon text-white-50">
					<i class="fas fa-trash"></i>
				</span>
				<span class="text">Hapus semua Guru</span>
			</button>
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
			<h3 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
		</div>
		<div class="card-body">
			<table id="datatable-guru" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th>Nip</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($guru as $g){ ?>
					<tr>
						<td><?php echo $g['nama_lengkap']; ?></td>
						<td><?php echo $g['nip']; ?></td>
						<td>
							<a href="<?= base_url('guru/edit/'.$g['id']); ?>"
								class="btn btn-info btn-icon-split btn-sm">
								<span class="icon text-white-50">
									<i class="fas fa-user"></i>
								</span>
								<span class="text">Edit</span>
							</a>

							<a href="<?= base_url('guru/remove/'.$g['id']); ?>"
								class="btn btn-danger btn-icon-split btn-sm">
								<span class="icon text-white-50">
									<i class="fas fa-user-minus"></i>
								</span>
								<span class="text">Hapus</span>
							</a>

							<?php
								$user_id = $this->db->get_where('users', ['username' => $g['email']])->num_rows();
								if($user_id < 1) {
							?>

							<a href="<?= base_url('guru/add_to_user/'.$g['id']); ?>"
								class="btn btn-warning btn-icon-split btn-sm">
								<span class="icon text-white-50">
									<i class="fas fa-user-plus"></i>
								</span>
								<span class="text">Jadikan user</span>
							</a>

								<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Nama Lengkap</th>
						<th>Nip</th>
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

<!-- Modal -->
<div class="modal fade" id="formUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Data Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php base_url('guru/do_upload'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Upload file excel data guru</span>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01"
								name="userfile" size="20">
							<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
						</div>
					</div>
					<!-- Divider -->
					<hr class="sidebar-divider d-none d-md-block">
					Download template data guru disini.
					<a href="<?= base_url('guru/download_template_guru'); ?>" class='btn btn-info btn-sm'>Template
						Guru</a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Hati-hati ketika melakukan hal ini!
				<br>
				Anda yakin untuk menghapus <b class="text-danger">Semua data guru</b>?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a class="btn btn-danger" href='<?= base_url('guru/delete_all_guru'); ?>'>Hapus Semua</a>
			</div>
		</div>
	</div>
</div>

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
