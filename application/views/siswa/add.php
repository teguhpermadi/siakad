<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Siswa</h3>
				</div>
				<div class="card-body">
					<?php echo form_open_multipart('siswa/add', array("class" => "form-horizontal")); ?>
					<h3 class="text-info font-weight-bold">Identitas Pribadi</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_lengkap"><span class="text-danger">*</span>Nama
									Lengkap</label>
								<input type="text" name="nama_lengkap" value="<?php echo $this->input->post('nama_lengkap'); ?>" class="form-control" id="nama_lengkap" />
								<span class="text-danger"><?php echo form_error('nama_lengkap'); ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_panggilan">Nama Panggilan</label>
								<input type="text" name="nama_panggilan" value="<?php echo $this->input->post('nama_panggilan'); ?>" class="form-control" id="nama_panggilan" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value="">select</option>
									<?php
									$jenis_kelamin_values = array(
										'L' => 'Laki-laki',
										'P' => 'Perempuan',
									);

									foreach ($jenis_kelamin_values as $value => $display_text) {
										$selected = ($value == $this->input->post('jenis_kelamin')) ? ' selected="selected"' : "";

										echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="agama">Agama</label>
								<select name="agama" class="form-control">
									<option value="">select</option>
									<?php
									$agama_values = array(
										'Islam' => 'Islam',
										'Kristen' => 'Kristen',
										'Katholik' => 'Katholik',
										'Hindu' => 'Hindu',
										'Budha' => 'Budha',
										'Konghuchu' => 'Konghuchu',
									);

									foreach ($agama_values as $value => $display_text) {
										$selected = ($value == $this->input->post('agama')) ? ' selected="selected"' : "";

										echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nis"><span class="text-danger">*</span>NIS (Nomor Induk Siswa)</label>
								<input type="text" pattern="\d*" name="nis" value="<?php echo $this->input->post('nis'); ?>" class="form-control" id="nis" />
								<span class="text-danger"><?php echo form_error('nis'); ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
								<input type="text" pattern="\d*" name="nisn" value="<?php echo $this->input->post('nisn'); ?>" class="form-control" id="nisn" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nik">NIK (Nomor Induk Kependudukan)</label>
								<input type="text" pattern="\d*" name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" maxlength="16"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nikk">NIKK (Nomor Induk Kartu Keluarga)</label>
								<input type="text" pattern="\d*" name="nikk" value="<?php echo $this->input->post('nikk'); ?>" class="form-control" id="nikk" maxlength="16"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" name="tempat_lahir" value="<?php echo $this->input->post('tempat_lahir'); ?>" class="form-control" id="tempat_lahir" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir</label>
								<input type="date" name="tanggal_lahir" value="<?php echo $this->input->post('tanggal_lahir'); ?>" class="form-control" id="tanggal_lahir" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="kelurahan">Kelurahan</label>
								<input type="text" name="kelurahan" value="<?php echo $this->input->post('kelurahan'); ?>" class="form-control" id="kelurahan" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kecamatan">Kecamatan</label>
								<input type="text" name="kecamatan" value="<?php echo $this->input->post('kecamatan'); ?>" class="form-control" id="kecamatan" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="kota_kab">Kota/Kab</label>
								<input type="text" name="kota_kab" value="<?php echo $this->input->post('kota_kab'); ?>" class="form-control" id="kota_kab" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="provinsi">Provinsi</label>
								<input type="text" name="provinsi" value="<?php echo $this->input->post('provinsi'); ?>" class="form-control" id="provinsi" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="kode_pos">Kode Pos</label>
								<input type="number" name="kode_pos" value="<?php echo $this->input->post('kode_pos'); ?>" class="form-control" id="kode_pos" maxlength="5"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tahun_masuk">Tanggal Masuk</label>
								<input type="number" name="tanggal_masuk" value="<?php echo $this->input->post('tanggal_masuk'); ?>" class="form-control" id="tanggal_masuk" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="aktif">Status Keaktifan</label>
								<div>
									<select name="aktif" class="form-control">
										<option value="">select</option>
										<?php
										$aktif_values = array(
											'1' => 'Aktif',
											'0' => 'Tidak Aktif',
										);

										foreach ($aktif_values as $value => $display_text) {
											// $selected = ($value == $this->input->post('aktif')) ? ' selected="selected"' : "";
											$selected = ($value == 1) ? ' selected="selected"' : "";

											echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<br>
						<input type="file" name="foto" id="foto" accept="image/x-jpg"/>
					</div>
					<h3 class="text-info font-weight-bold">Identitas Ayah</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="ayah">Ayah</label>
								<input type="text" name="ayah" value="<?php echo $this->input->post('ayah'); ?>" class="form-control" id="ayah" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pekerjaan_ayah">Pekerjaan Ayah</label>
								<input type="text" name="pekerjaan_ayah" value="<?php echo $this->input->post('pekerjaan_ayah'); ?>" class="form-control" id="pekerjaan_ayah" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="penghasilan_ayah">Penghasilan Ayah</label>
								<input type="number" name="penghasilan_ayah" value="<?php echo $this->input->post('penghasilan_ayah'); ?>" class="form-control" id="penghasilan_ayah" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="telp_ayah">Telp Ayah</label>
								<input type="number" name="telp_ayah" value="<?php echo $this->input->post('telp_ayah'); ?>" class="form-control" id="telp_ayah" />
							</div>
						</div>
					</div>
					<h3 class="text-info font-weight-bold">Identitas Ibu</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="ibu">Ibu</label>
								<input type="text" name="ibu" value="<?php echo $this->input->post('ibu'); ?>" class="form-control" id="ibu" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pekerjaan_ibu">Pekerjaan Ibu</label>
								<input type="text" name="pekerjaan_ibu" value="<?php echo $this->input->post('pekerjaan_ibu'); ?>" class="form-control" id="pekerjaan_ibu" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="penghasilan_ibu">Penghasilan Ibu</label>
								<input type="number" name="penghasilan_ibu" value="<?php echo $this->input->post('penghasilan_ibu'); ?>" class="form-control" id="penghasilan_ibu" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="telp_ibu">Telp Ibu</label>
								<input type="number" name="telp_ibu" value="<?php echo $this->input->post('telp_ibu'); ?>" class="form-control" id="telp_ibu" />
							</div>
						</div>
					</div>
					<h3 class="text-info font-weight-bold">Identitas Wali</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="wali">Wali</label>
								<input type="text" name="wali" value="<?php echo $this->input->post('wali'); ?>" class="form-control" id="wali" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pekerjaan_wali">Pekerjaan Wali</label>
								<input type="text" name="pekerjaan_wali" value="<?php echo $this->input->post('pekerjaan_wali'); ?>" class="form-control" id="pekerjaan_wali" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="penghasilan_wali">Penghasilan Wali</label>
								<input type="number" name="penghasilan_wali" value="<?php echo $this->input->post('penghasilan_wali'); ?>" class="form-control" id="penghasilan_wali" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="telp_wali">Telp Wali</label>
								<input type="number" name="telp_wali" value="<?php echo $this->input->post('telp_wali'); ?>" class="form-control" id="telp_wali" />
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= base_url('siswa') ?>" class="btn btn-secondary">Batal</a>
						</div>
					</div>

					<?php echo form_close(); ?>
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