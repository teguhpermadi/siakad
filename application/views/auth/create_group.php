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
				<div class="card-body">
					<?php if($message) {?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<?= $message ;?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<?php echo form_open("auth/create_group");?>

					<div class="form-group">
						<?php echo lang('create_group_name_label', 'group_name');?> <br />
						<?php echo form_input($group_name);?>
					</div>

					<div class="form-group">
						<?php echo lang('create_group_desc_label', 'description');?> <br />
						<?php echo form_input($description);?>
					</div>

					<div class="form-group">
						<?php echo form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-primary"');?>
					</div>

					<?php echo form_close();?>
				</div>
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
