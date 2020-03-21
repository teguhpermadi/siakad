<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">
	<div class="col-md-12">
		<?php echo form_open('kompetensi_dasar/simpan',array("class"=>"form-horizontal")); ?>

		<div class="form-group">
			<label for="id_mapel" class="col-md-12 control-label">Mapel</label>
			<div class="col-md-12">
				<input type="text" value='<?= $mapel['id']; ?>' name='id_mapel' id='id_mapel' hidden>
				<input type="text" class="form-control" value='<?= $mapel['nama']; ?>' readonly>
			</div>
		</div>
		<div class="form-group">
			<label for="tingkat" class="col-md-12 control-label">Kelas Tingkat</label>
			<div class="col-md-12">
				<select name="tingkat" class="form-control">
					<?php 
			foreach($tingkat as $t)
			{
				$selected = ($t['tingkat'] == $this->input->post('tingkat')) ? ' selected="selected"' : "";

				echo '<option value="'.$t['tingkat'].'" '.$selected.'>tingkat '.$t['tingkat'].'</option>';
			} 
			?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="kd" class="col-md-12 control-label">Deskripsi Kompetensi Dasar</label>
			<div class="col-md-12">
				<textarea class="form-control" name="kd" id="kd" value="<?php echo $this->input->post('kd'); ?>"  required></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('kompetensi_dasar') ?>" class="btn btn-secondary">Batal</a>
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
