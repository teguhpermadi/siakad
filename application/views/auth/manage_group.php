<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kelola Grup</h1>
	</div>

	<div class='row'>
		<div class='col-md-6'>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Tambah Grup</h6>
				</div>
				<form>
					<div class="card-body">
						<div class="form-group">
							<label for="">Group Name</label>
							<input type="text" class='form-control'>
						</div>
						<div class="form-group">
							<label for="">Description</label>
							<input type="text" class='form-control'>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class='btn btn-primary'>Simpan</button>
					</div>
				</form>
			</div>
		</div>

		<div class='col-md-6'>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Daftar Grup</h6>
				</div>
				<div class="card-body">
					The styling for this basic card example is created by using default Bootstrap utility classes. By
					using utility classes, the style of the card component can be easily modified with no need for any
					custom CSS!
					<table class='table table-hover'>
						<?php foreach ($groups as $group) { ?>
							<tr>
								<td><?= $group['name'] ?></td>
								<td><?= $group['description'] ?></td>
								<td><a href="<?= base_url('auth/edit_group/'.$group['id']) ?>" class="btn btn-warning btn-sm">Edit</a></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
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