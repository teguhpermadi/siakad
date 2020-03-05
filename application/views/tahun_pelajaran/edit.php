<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tahun Pelajaran</h3>
				</div>
				<div class="card-body">
					<?php echo form_open('tahun_pelajaran/edit/'.$tahun_pelajaran['id'],array("class"=>"form-horizontal")); ?>
					<div class="form-group">
						<label for="tahun" class="col-md-4 control-label"><span
								class="text-danger">*</span>Tahun</label>
						<div class="col-md-8">
							<input type="text" name="tahun"
								value="<?php echo ($this->input->post('tahun') ? $this->input->post('tahun') : $tahun_pelajaran['tahun']); ?>"
								class="form-control" id="tahun" />
							<span class="text-danger"><?php echo form_error('tahun');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="semester" class="col-md-4 control-label"><span
								class="text-danger">*</span>Semester</label>
						<div class="col-md-8">
							<select name="semester" class="form-control">
								<option value="">select</option>
								<?php 
            $semester_values = array(
                'ganjil'=>'Ganjil',
                'genap'=>'Genap',
            );

            foreach($semester_values as $value => $display_text)
            {
                $selected = ($value == $tahun_pelajaran['semester']) ? ' selected="selected"' : "";

                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
							</select>
							<span class="text-danger"><?php echo form_error('semester');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="id_kepsek" class="col-md-4 control-label"><span
								class="text-danger">*</span>Guru</label>
						<div class="col-md-8">
							<select name="id_kepsek" class="form-control">
								<option value="">select guru</option>
								<?php 
            foreach($all_guru as $guru)
            {
                $selected = ($guru['id'] == $tahun_pelajaran['id_kepsek']) ? ' selected="selected"' : "";

                echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['nama_lengkap'].'</option>';
            } 
            ?>
							</select>
							<span class="text-danger"><?php echo form_error('id_kepsek');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal_rapor" class="col-md-4 control-label"><span
								class="text-danger">*</span>Tanggal Rapor</label>
						<div class="col-md-8">
							<input type="date" name="tanggal_rapor"
								value="<?php echo ($this->input->post('tanggal_rapor') ? $this->input->post('tanggal_rapor') : $tahun_pelajaran['tanggal_rapor']); ?>"
								class="form-control" id="tanggal_rapor" />
							<span class="text-danger"><?php echo form_error('tanggal_rapor');?></span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href='<?= base_url('tahun_pelajaran') ?>' class="btn btn-secondary">Batal</a>
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
