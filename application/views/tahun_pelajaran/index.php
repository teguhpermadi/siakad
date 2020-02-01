<!-- Begin Page Content -->
<div class="container-fluid">

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
							<th>ID</th>
							<th>Semester</th>
							<th>Id Kepsek</th>
							<th>Tahun</th>
							<th>Tanggal Rapor</th>
							<th>Actions</th>
						</tr>
						<?php foreach($tahun_pelajaran as $t){ ?>
						<tr>
							<td><?php echo $t['id']; ?></td>
							<td><?php echo $t['semester']; ?></td>
							<td><?php echo $t['id_kepsek']; ?></td>
							<td><?php echo $t['tahun']; ?></td>
							<td><?php echo $t['tanggal_rapor']; ?></td>
							<td>
								<a href="<?php echo site_url('tahun_pelajaran/edit/'.$t['id']); ?>"
									class="btn btn-info btn-xs">Edit</a>
								<a href="<?php echo site_url('tahun_pelajaran/remove/'.$t['id']); ?>"
									class="btn btn-danger btn-xs">Delete</a>
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
