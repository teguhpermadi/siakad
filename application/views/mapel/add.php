<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Mata Pelajaran</h3>
				</div>
				<div class="card-body">
					<?php echo form_open('mapel/add',array("class"=>"form-horizontal")); ?>

					<div class="form-group">
						<label for="kelompok" class="col-md-4 control-label"><span
								class="text-danger">*</span>Kelompok</label>
						<div class="col-md-8">
							<select name="kelompok" class="form-control">
								<option value="">select</option>
								<?php 
            $kelompok_values = array(
                'A'=>'Kelompok A',
                'B'=>'Kelompok B',
                'C'=>'Kelompok C',
            );

            foreach($kelompok_values as $value => $display_text)
            {
                $selected = ($value == $this->input->post('kelompok')) ? ' selected="selected"' : "";

                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
							</select>
							<span class="text-danger"><?php echo form_error('kelompok');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-md-4 control-label"><span class="text-danger">*</span>Nama</label>
						<div class="col-md-8">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>"
								class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="kode" class="col-md-4 control-label">kode</label>
						<div class="col-md-8">
							<input type="text" name="kode" value="<?php echo $this->input->post('kode'); ?>"
								class="form-control" id="kode" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url('mapel'); ?>" class='btn btn-secondary'>Batal</a>
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
