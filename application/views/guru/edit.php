<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Edit Data Guru</h6>
		</div>
		<div class="card-body">
			<?php echo form_open('guru/edit/'.$guru['id'],array("class"=>"form-horizontal")); ?>
			<div class="form-group">
				<label for="nama_lengkap" class="col-md-12 control-label"><span class="text-danger">*</span>Nama
					Lengkap</label>
				<div class="col-md-12">
					<input type="text" name="nama_lengkap"
						value="<?php echo ($this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : $guru['nama_lengkap']); ?>"
						class="form-control" id="nama_lengkap" />
					<span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="jenis_kelamin" class="col-md-12 control-label"><span class="text-danger">*</span>Jenis
					Kelamin</label>
				<div class="col-md-12">
					<select name="jenis_kelamin" class="form-control">
						<option value="">select</option>
						<?php 
							$jenis_kelamin_values = array(
							'L'=>'Laki-laki',
							'P'=>'Perempuan',
							);

							foreach($jenis_kelamin_values as $value => $display_text)
							{
							$selected = ($value == $guru['jenis_kelamin']) ? ' selected="selected"' : "";

							echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
							} 
							?>
					</select>
					<span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
				</div>
			</div>

			<div class="form-group">
				<label for="tempat_lahir" class="col-md-12 control-label">Tempat Lahir</label>
				<div class="col-md-12">
					<input type="text" name="tempat_lahir"
						value="<?php echo ($this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') : $guru['tempat_lahir']); ?>"
						class="form-control" id="tempat_lahir" />
				</div>
			</div>
			<div class="form-group">
				<label for="tanggal_lahir" class="col-md-12 control-label">Tanggal Lahir</label>
				<div class="col-md-4">
					<input type="date" name="tanggal_lahir"
						value="<?php echo ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : $guru['tanggal_lahir']); ?>"
						class="form-control" id="tanggal_lahir" />
				</div>
			</div>
			<div class="form-group">
				<label for="nip" class="col-md-12 control-label">Nip</label>
				<div class="col-md-12">
					<input type="text" name="nip"
						value="<?php echo ($this->input->post('nip') ? $this->input->post('nip') : $guru['nip']); ?>"
						class="form-control" id="nip" />
					<span class="text-danger"><?php echo form_error('nip');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="nik" class="col-md-12 control-label">Nik</label>
				<div class="col-md-12">
					<input type="text" name="nik"
						value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $guru['nik']); ?>"
						class="form-control" id="nik" />
					<span class="text-danger"><?php echo form_error('nik');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="nikk" class="col-md-12 control-label">Nikk</label>
				<div class="col-md-12">
					<input type="text" name="nikk"
						value="<?php echo ($this->input->post('nikk') ? $this->input->post('nikk') : $guru['nikk']); ?>"
						class="form-control" id="nikk" />
					<span class="text-danger"><?php echo form_error('nikk');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="col-md-12 control-label">Alamat</label>
				<div class="col-md-12">
					<input type="text" name="alamat"
						value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $guru['alamat']); ?>"
						class="form-control" id="alamat" />
				</div>
			</div>
			<div class="form-group">
				<label for="gelar_depan" class="col-md-12 control-label">Gelar Depan</label>
				<div class="col-md-12">
					<input type="text" name="gelar_depan"
						value="<?php echo ($this->input->post('gelar_depan') ? $this->input->post('gelar_depan') : $guru['gelar_depan']); ?>"
						class="form-control" id="gelar_depan" />
				</div>
			</div>
			<div class="form-group">
				<label for="gelar_belakang" class="col-md-12 control-label">Gelar Belakang</label>
				<div class="col-md-12">
					<input type="text" name="gelar_belakang"
						value="<?php echo ($this->input->post('gelar_belakang') ? $this->input->post('gelar_belakang') : $guru['gelar_belakang']); ?>"
						class="form-control" id="gelar_belakang" />
				</div>
			</div>
			<div class="form-group">
				<label for="pendidikan_terakhir" class="col-md-12 control-label">Pendidikan Terakhir</label>
				<div class="col-md-12">
					<input type="text" name="pendidikan_terakhir"
						value="<?php echo ($this->input->post('pendidikan_terakhir') ? $this->input->post('pendidikan_terakhir') : $guru['pendidikan_terakhir']); ?>"
						class="form-control" id="pendidikan_terakhir" />
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-md-12 control-label">Email</label>
				<div class="col-md-12">
					<input type="text" name="email"
						value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $guru['email']); ?>"
						class="form-control" id="email" />
					<span class="text-danger"><?php echo form_error('email');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="telp" class="col-md-12 control-label">Telp</label>
				<div class="col-md-12">
					<input type="text" name="telp"
						value="<?php echo ($this->input->post('telp') ? $this->input->post('telp') : $guru['telp']); ?>"
						class="form-control" id="telp" />
					<span class="text-danger"><?php echo form_error('telp');?></span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?= base_url('guru') ?>" class="btn btn-secondary">Batal</a>
				</div>
			</div>

			<?php echo form_close(); ?>
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
