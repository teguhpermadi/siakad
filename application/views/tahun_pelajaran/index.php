<!-- Begin Page Content -->
<div class="container-fluid">

<!-- page heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tahun Pelajaran</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<a href="<?= base_url('tahun_pelajaran/add'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-calendar"></i>
				</span>
				<span class="text">Tambah tahun pelajaran</span>
			</a>
		</div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
		</div>
		<div class="card-body">
			<table id="datatable-siswa" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th>NIS</th>
						<th>Aktif</th>
						<th>Actions</th>
				</thead>

				<?php foreach($siswa as $m){ ?>
				<tr>
					<td><?php echo $m['nama_lengkap']; ?></td>
					<td><?php echo $m['nis']; ?></td>
					<td><?php echo $m['aktif']; ?></td>
					<td>
						<a href="<?php echo site_url('siswa/edit/'.$m['id']); ?>" class="btn btn-info btn-xs">Edit</a>
						<a href="<?php echo site_url('siswa/remove/'.$m['id']); ?>"
							class="btn btn-danger btn-xs">Delete</a>
					</td>
				</tr>
				<?php } ?>
				<tfoot>
					<tr>
						<th>Nama Lengkap</th>
						<th>NIS</th>
						<th>Aktif</th>
						<th>Actions</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Tahun Pelajaran</h3>
					<div class="box-tools">
						<a href="<?php echo site_url('tahun_pelajaran/add'); ?>" class="btn btn-success btn-sm">Add</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-striped table-bordered">
						<tr>
							<th>Status</th>
							<th>Semester</th>
							<th>Id Kepsek</th>
							<th>Tahun</th>
							<th>Tanggal Rapor</th>
							<th>Actions</th>
						</tr>
						<?php foreach($tahun_pelajaran as $t){ ?>
						<tr>
							<td><?php if($_SESSION['id_tahun_pelajaran'] == $t['id']) { ?><span
									class="badge badge-primary">Aktif</span> <?php } ?></td>
							<td><?php echo $t['semester']; ?></td>
							<td><?php echo $t['id_kepsek']; ?></td>
							<td><?php echo $t['tahun']; ?></td>
							<td><?php echo $t['tanggal_rapor']; ?></td>
							<td>
								<a href="<?php echo site_url('tahun_pelajaran/edit/'.$t['id']); ?>"
									class="btn btn-info btn-xs">Edit</a>
								<a href="<?php echo site_url('tahun_pelajaran/remove/'.$t['id']); ?>"
									class="btn btn-danger btn-xs">Delete</a>
								<?php if($_SESSION['id_tahun_pelajaran'] != $t['id']){ ?>
								<a href='<?= site_url('tahun_pelajaran/set_session/'.$t['id']) ?>'
									class='btn btn-primary btn-xs'>Aktifkan</a>
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
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
