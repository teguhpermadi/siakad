<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">
	<div class="col-md-12">
		<?php echo form_open('kompetensi_dasar/add',array("class"=>"form-horizontal")); ?>

		<div class="form-group">
			<label for="id_mapel" class="col-md-12 control-label"><span class="text-danger">*</span>Mapel</label>
			<div class="col-md-12">
				<select name="id_mapel" class="form-control">
					<option value="">select mapel</option>
					<?php 
			foreach($all_mapel as $mapel)
			{
				$selected = ($mapel['id'] == $this->input->post('id_mapel')) ? ' selected="selected"' : "";

				echo '<option value="'.$mapel['id'].'" '.$selected.'>'.$mapel['nama'].'</option>';
			} 
			?>
				</select>
				<span class="text-danger"><?php echo form_error('id_mapel');?></span>
			</div>
		</div>
		<div class="form-group">
			<label for="id_kelas" class="col-md-12 control-label"><span class="text-danger">*</span>Kelas</label>
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
			<label for="kd" class="col-md-12 control-label"><span class="text-danger">*</span>Kd</label>
			<div class="col-md-12">
				<input type="text" name="kd" value="<?php echo $this->input->post('kd'); ?>" class="form-control"
					id="kd" />
				<span class="text-danger"><?php echo form_error('kd');?></span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>

		<?php echo form_close(); ?>
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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
