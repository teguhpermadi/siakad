<!-- Begin Page Content -->
<div class="container-fluid">

	<div class='row'>
		<div class='col-md-12'>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Pengguna</h3>
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
					<?php echo form_open("auth/create_user");?>

					<p>
						<?php echo form_input($first_name);?>
					</p>

					<p>
						<?php echo form_input($last_name);?>
					</p>

					<?php
                    if($identity_column!=='email') {
                        echo '<p>';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</p>';
                    }
                    ?>

					<p>
						<?php echo form_input($company);?>
					</p>

					<p>
						<?php echo form_input($email);?>
					</p>

					<p>
						<?php echo form_input($phone);?>
					</p>

					<p>
						<?php echo form_input($password);?>
					</p>

					<p>
						<?php echo form_input($password_confirm);?>
					</p>


					<p><?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?></p>

					<?php echo form_close();?>

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
