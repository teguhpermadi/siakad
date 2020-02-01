<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Guru</h3>
				</div>
				<div class="card-body">
					<?php echo form_open('kelas/edit/'.$kelas['id'],array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="tingkat" class="col-md-4 control-label"><span
								class="text-danger">*</span>Tingkat</label>
						<div class="col-md-8">
							<select name="tingkat" class="form-control">
								<option value="">select</option>
								<?php 
            $tingkat_values = array(
                '10'=>'10',
                '11'=>'11',
                '12'=>'12',
            );

            foreach($tingkat_values as $value => $display_text)
            {
                $selected = ($value == $kelas['tingkat']) ? ' selected="selected"' : "";

                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
							</select>
							<span class="text-danger"><?php echo form_error('tingkat');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-md-4 control-label"><span class="text-danger">*</span>Nama</label>
						<div class="col-md-8">
							<input type="text" name="nama"
								value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $kelas['nama']); ?>"
								class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="kode_kelas" class="col-md-4 control-label">Kode Kelas</label>
						<div class="col-md-8">
							<input type="text" name="kode_kelas"
								value="<?php echo ($this->input->post('kode_kelas') ? $this->input->post('kode_kelas') : $kelas['kode_kelas']); ?>"
								class="form-control" id="kode_kelas" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a class="btn btn-secondary" href="<?= base_url('kelas'); ?>">Batal</a>
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
