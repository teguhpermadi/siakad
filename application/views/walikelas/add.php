<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Walikelas</h3>
				</div>
				<div class="card-body">
					<?php echo form_open('walikelas/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="id_guru" class="col-md-12 control-label"><span
								class="text-danger">*</span>Guru</label>
						<div class="col-md-12">
							<select name="id_guru" class="form-control">
								<option value="">select guru</option>
								<?php 
                                foreach($all_guru as $guru)
                                {
                                    $selected = ($guru['id'] == $this->input->post('id_guru')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['nama_lengkap'].'</option>';
                                } 
                                ?>
							</select>
							<span class="text-danger"><?php echo form_error('id_guru');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="id_kelas" class="col-md-12 control-label"><span
								class="text-danger">*</span>Kelas</label>
						<div class="col-md-12">
							<select name="id_kelas" class="form-control">
								<option value="">select kelas</option>
								<?php 
                                foreach($all_kelas as $kelas)
                                {
                                    $selected = ($kelas['id'] == $this->input->post('id_kelas')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$kelas['id'].'" '.$selected.'>'.$kelas['nama'].'</option>';
                                } 
                                ?>
							</select>
							<span class="text-danger"><?php echo form_error('id_kelas');?></span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('walikelas'); ?>" class='btn btn-secondary'>Batal</a>
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
