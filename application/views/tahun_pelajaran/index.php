<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tahun Pelajaran</h1>
	</div>

	<!-- cek status user, jika user adalah admin maka dapat menambahkan tahun pelajaran -->
	<?php
	if (user_info()['user_role'] == 'administrator') {
	?>
		<div class="row mb-4">
			<div class="col">
				<a href="<?= base_url('tahun_pelajaran/add'); ?>" class="btn btn-info btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-calendar"></i>
					</span>
					<span class="text">Tambah</span>
				</a>
			</div>
		</div>
	<?php } else { ?>
		<!-- jika status user bukan administrator, maka tampilkan pesan berikut ini -->
		<div>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Hanya <b>Administrator</b> yang bisa menambahkan Tahun Pelajaran Baru
			</div>
		</div>
	<?php } ?>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Daftar Tahun Pelajaran</h6>
		</div>
		<div class="card-body">
			<table id="datatable-tahun-pelajaran" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Status</th>
						<th>Tahun</th>
						<th>Semester</th>
						<th>Kepala Sekolah</th>
						<th>Tanggal Rapor</th>
						<th>TTD Kepala</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tahun_pelajaran as $t) { ?>
						<tr>
							<td><?php if ($_SESSION['id_tahun_pelajaran'] == $t['id']) { ?><span class="badge badge-primary">Aktif</span> <?php } ?></td>
							<td><?php echo $t['tahun']; ?></td>
							<td><?php echo $t['semester']; ?></td>
							<td><?php echo $t['kepsek']; ?></td>
							<td><?php echo $t['tanggal_rapor']; ?></td>
							<td>
								<img src="<?= base_url('uploads/'.$t['ttd']) ?>" alt="not found" srcset="" width="150px">
							</td>
							<td>
								<a href="<?php echo site_url('tahun_pelajaran/edit/' . $t['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('tahun_pelajaran/remove/' . $t['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
								<?php if ($_SESSION['id_tahun_pelajaran'] != $t['id']) { ?>
									<a href='<?= site_url('tahun_pelajaran/set_session/' . $t['id']) ?>' class='btn btn-primary btn-sm'>Aktifkan</a>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Status</th>
						<th>Semester</th>
						<th>Id Kepsek</th>
						<th>Tahun</th>
						<th>Tanggal Rapor</th>
						<th>TTD Kepala</th>
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