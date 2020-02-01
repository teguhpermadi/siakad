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
					<?php echo form_open('siswa/add',array("class"=>"form-horizontal")); ?>
					<div class="form-group">
						<label for="nama_lengkap" class="col-md-4 control-label"><span class="text-danger">*</span>Nama
							Lengkap</label>
						<div class="col-md-8">
							<input type="text" name="nama_lengkap"
								value="<?php echo $this->input->post('nama_lengkap'); ?>" class="form-control"
								id="nama_lengkap" />
							<span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="nama_panggilan" class="col-md-4 control-label">Nama Panggilan</label>
						<div class="col-md-8">
							<input type="text" name="nama_panggilan"
								value="<?php echo $this->input->post('nama_panggilan'); ?>" class="form-control"
								id="nama_panggilan" />
						</div>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>
						<div class="col-md-8">
							<select name="jenis_kelamin" class="form-control">
								<option value="">select</option>
								<?php 
            $jenis_kelamin_values = array(
                'L'=>'Laki-laki',
                'P'=>'Perempuan',
            );

            foreach($jenis_kelamin_values as $value => $display_text)
            {
                $selected = ($value == $this->input->post('jenis_kelamin')) ? ' selected="selected"' : "";

                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="agama" class="col-md-4 control-label">Agama</label>
						<div class="col-md-8">
							<select name="agama" class="form-control">
								<option value="">select</option>
								<?php 
            $agama_values = array(
                'Islam'=>'Islam',
                'Kristen'=>'Kristen',
                'Katholik'=>'Katholik',
                'Hindu'=>'Hindu',
                'Budha'=>'Budha',
                'Konghuchu'=>'Konghuchu',
            );

            foreach($agama_values as $value => $display_text)
            {
                $selected = ($value == $this->input->post('agama')) ? ' selected="selected"' : "";

                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="aktif" class="col-md-4 control-label">Aktif</label>
						<div class="col-md-8">
							<select name="aktif" class="form-control">
								<option value="">select</option>
								<?php 
            $aktif_values = array(
                '1'=>'Aktif',
                '0'=>'Tidak Aktif',
            );

            foreach($aktif_values as $value => $display_text)
            {
                $selected = ($value == $this->input->post('aktif')) ? ' selected="selected"' : "";

                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="nis" class="col-md-4 control-label">Nis</label>
						<div class="col-md-8">
							<input type="text" name="nis" value="<?php echo $this->input->post('nis'); ?>"
								class="form-control" id="nis" />
						</div>
					</div>
					<div class="form-group">
						<label for="nisn" class="col-md-4 control-label">Nisn</label>
						<div class="col-md-8">
							<input type="text" name="nisn" value="<?php echo $this->input->post('nisn'); ?>"
								class="form-control" id="nisn" />
						</div>
					</div>
					<div class="form-group">
						<label for="nik" class="col-md-4 control-label">Nik</label>
						<div class="col-md-8">
							<input type="text" name="nik" value="<?php echo $this->input->post('nik'); ?>"
								class="form-control" id="nik" />
						</div>
					</div>
					<div class="form-group">
						<label for="nikk" class="col-md-4 control-label">Nikk</label>
						<div class="col-md-8">
							<input type="text" name="nikk" value="<?php echo $this->input->post('nikk'); ?>"
								class="form-control" id="nikk" />
						</div>
					</div>
					<div class="form-group">
						<label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
						<div class="col-md-8">
							<input type="date" name="tempat_lahir"
								value="<?php echo $this->input->post('tempat_lahir'); ?>" class="form-control"
								id="tempat_lahir" />
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
						<div class="col-md-8">
							<input type="text" name="tanggal_lahir"
								value="<?php echo $this->input->post('tanggal_lahir'); ?>" class="form-control"
								id="tanggal_lahir" />
						</div>
					</div>
					<div class="form-group">
						<label for="alamat" class="col-md-4 control-label">Alamat</label>
						<div class="col-md-8">
							<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>"
								class="form-control" id="alamat" />
						</div>
					</div>
					<div class="form-group">
						<label for="kelurahan" class="col-md-4 control-label">Kelurahan</label>
						<div class="col-md-8">
							<input type="text" name="kelurahan" value="<?php echo $this->input->post('kelurahan'); ?>"
								class="form-control" id="kelurahan" />
						</div>
					</div>
					<div class="form-group">
						<label for="kecamatan" class="col-md-4 control-label">Kecamatan</label>
						<div class="col-md-8">
							<input type="text" name="kecamatan" value="<?php echo $this->input->post('kecamatan'); ?>"
								class="form-control" id="kecamatan" />
						</div>
					</div>
					<div class="form-group">
						<label for="kota_kab" class="col-md-4 control-label">Kota Kab</label>
						<div class="col-md-8">
							<input type="text" name="kota_kab" value="<?php echo $this->input->post('kota_kab'); ?>"
								class="form-control" id="kota_kab" />
						</div>
					</div>
					<div class="form-group">
						<label for="provinsi" class="col-md-4 control-label">Provinsi</label>
						<div class="col-md-8">
							<input type="text" name="provinsi" value="<?php echo $this->input->post('provinsi'); ?>"
								class="form-control" id="provinsi" />
						</div>
					</div>
					<div class="form-group">
						<label for="kode_pos" class="col-md-4 control-label">Kode Pos</label>
						<div class="col-md-8">
							<input type="text" name="kode_pos" value="<?php echo $this->input->post('kode_pos'); ?>"
								class="form-control" id="kode_pos" />
						</div>
					</div>
					<div class="form-group">
						<label for="ayah" class="col-md-4 control-label">Ayah</label>
						<div class="col-md-8">
							<input type="text" name="ayah" value="<?php echo $this->input->post('ayah'); ?>"
								class="form-control" id="ayah" />
						</div>
					</div>
					<div class="form-group">
						<label for="pekerjaan_ayah" class="col-md-4 control-label">Pekerjaan Ayah</label>
						<div class="col-md-8">
							<input type="text" name="pekerjaan_ayah"
								value="<?php echo $this->input->post('pekerjaan_ayah'); ?>" class="form-control"
								id="pekerjaan_ayah" />
						</div>
					</div>
					<div class="form-group">
						<label for="penghasilan_ayah" class="col-md-4 control-label">Penghasilan Ayah</label>
						<div class="col-md-8">
							<input type="text" name="penghasilan_ayah"
								value="<?php echo $this->input->post('penghasilan_ayah'); ?>" class="form-control"
								id="penghasilan_ayah" />
						</div>
					</div>
					<div class="form-group">
						<label for="ibu" class="col-md-4 control-label">Ibu</label>
						<div class="col-md-8">
							<input type="text" name="ibu" value="<?php echo $this->input->post('ibu'); ?>"
								class="form-control" id="ibu" />
						</div>
					</div>
					<div class="form-group">
						<label for="pekerjaan_ibu" class="col-md-4 control-label">Pekerjaan Ibu</label>
						<div class="col-md-8">
							<input type="text" name="pekerjaan_ibu"
								value="<?php echo $this->input->post('pekerjaan_ibu'); ?>" class="form-control"
								id="pekerjaan_ibu" />
						</div>
					</div>
					<div class="form-group">
						<label for="penghasilan_ibu" class="col-md-4 control-label">Penghasilan Ibu</label>
						<div class="col-md-8">
							<input type="text" name="penghasilan_ibu"
								value="<?php echo $this->input->post('penghasilan_ibu'); ?>" class="form-control"
								id="penghasilan_ibu" />
						</div>
					</div>
					<div class="form-group">
						<label for="wali" class="col-md-4 control-label">Wali</label>
						<div class="col-md-8">
							<input type="text" name="wali" value="<?php echo $this->input->post('wali'); ?>"
								class="form-control" id="wali" />
						</div>
					</div>
					<div class="form-group">
						<label for="pekerjaan_wali" class="col-md-4 control-label">Pekerjaan Wali</label>
						<div class="col-md-8">
							<input type="text" name="pekerjaan_wali"
								value="<?php echo $this->input->post('pekerjaan_wali'); ?>" class="form-control"
								id="pekerjaan_wali" />
						</div>
					</div>
					<div class="form-group">
						<label for="penghasilan_wali" class="col-md-4 control-label">Penghasilan Wali</label>
						<div class="col-md-8">
							<input type="text" name="penghasilan_wali"
								value="<?php echo $this->input->post('penghasilan_wali'); ?>" class="form-control"
								id="penghasilan_wali" />
						</div>
					</div>
					<div class="form-group">
						<label for="foto" class="col-md-4 control-label">Foto</label>
						<div class="col-md-8">
							<input type="text" name="foto" value="<?php echo $this->input->post('foto'); ?>"
								class="form-control" id="foto" />
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal_masuk" class="col-md-4 control-label">Tahun Masuk</label>
						<div class="col-md-8">
							<input type="text" name="tanggal_masuk"
								value="<?php echo $this->input->post('tanggal_masuk'); ?>" class="form-control"
								id="tanggal_masuk" />
						</div>
					</div>
					<div class="form-group">
						<label for="telp_siswa" class="col-md-4 control-label">Telp Siswa</label>
						<div class="col-md-8">
							<input type="text" name="telp_siswa" value="<?php echo $this->input->post('telp_siswa'); ?>"
								class="form-control" id="telp_siswa" />
						</div>
					</div>
					<div class="form-group">
						<label for="telp_ayah" class="col-md-4 control-label">Telp Ayah</label>
						<div class="col-md-8">
							<input type="text" name="telp_ayah" value="<?php echo $this->input->post('telp_ayah'); ?>"
								class="form-control" id="telp_ayah" />
						</div>
					</div>
					<div class="form-group">
						<label for="telp_ibu" class="col-md-4 control-label">Telp Ibu</label>
						<div class="col-md-8">
							<input type="text" name="telp_ibu" value="<?php echo $this->input->post('telp_ibu'); ?>"
								class="form-control" id="telp_ibu" />
						</div>
					</div>

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
