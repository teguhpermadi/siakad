<body class="bg-gradient-primary">

	<div class="container">
		<br><br><br>
		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-2">Anda lupa password?</h1>
										<!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below
											and we'll send you a link to reset your password!</p> -->
									</div>

									<div id="infoMessage"><?php echo $message;?></div>

									<?php echo form_open("auth/forgot_password", 'class="user"');?>

									<div class="form-group">
										<?php echo form_input($identity);?>
									</div>

									<p>
										<?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary btn-user btn-block"');?>
									</p>

									<?php echo form_close();?>

									<!-- <form class="user">
										<div class="form-group">
											<input type="email" class="form-control form-control-user"
												id="exampleInputEmail" aria-describedby="emailHelp"
												placeholder="Enter Email Address...">
										</div>
										<a href="login.html" class="btn btn-primary btn-user btn-block">
											Reset Password
										</a>
									</form> -->
									<hr>
									<div class="text-center">
										<a class="small" href="<?= base_url('auth/login'); ?>">Sudah memiliki akun</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
