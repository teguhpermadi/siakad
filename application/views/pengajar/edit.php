<!-- Begin Page Content -->
<div class="container-fluid">

	<?php echo form_open('pengajar/edit/'.$pengajar['id'],array("class"=>"form-horizontal")); ?>
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Identitas Pengajar</h3>
				</div>

				<div class="card-body">
					<div class="box-body">
						<div class="form-group">
							<label for="id_tahun" class="col-md-4 control-label">Tahun Pelajaran</label>
							<div class="col-md-12">
								<input type="text" name="id_tahun"
									value="<?php echo ($this->input->post('id_tahun') ? $this->input->post('id_tahun') : $pengajar['id_tahun']); ?>"
									class="form-control" id="id_tahun" hidden />
								<input type="text" value='<?= $_SESSION['tahun']; ?>' class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Semester</label>
							<div class="col-md-12">
								<input type="text" value='<?= $_SESSION['semester']; ?>' class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="id_guru" class="col-md-4 control-label">Guru</label>
							<div class="col-md-12">
								<select name="id_guru" class="form-control" disabled>
									<option value="">select guru</option>
									<?php 
										foreach($all_guru as $guru)
										{
											$selected = ($guru['id'] == $pengajar['id_guru']) ? ' selected="selected"' : "";

											echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['nama_lengkap'].'</option>';
										} 
										?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<a href="<?= base_url('pengajar'); ?>" class='btn btn-secondary'>Kembali</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- row baru -->
	<div class="row">
		<div class="col-12">
		<?php foreach($mapel as $m) {?>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary"><?= $m['nama_mapel']; ?></h3>
				</div>
				<div class="card-body">
					<div class="box-body">
						<input type="text" value='<?= $m['id_mapel']; ?>' name='id_mapel_<?= $m['id_mapel']; ?>'>
						<div class="form-group col-md-4">
						<label for="">Anggota Rombel</label>
						<select class='searchable' multiple='multiple' name='id_mapel_<?= $m['id_mapel']; ?>[]' id='id_mapel_<?= $m['id_mapel']; ?>' required>
							<?php foreach($siswa as $m){ ?>
							<!-- <option value='<?= $m['id']; ?>'><?= $m['nama_lengkap']; ?></option> -->
							<?php } ?>
						</select>
					</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>

	<?php echo form_close(); ?>
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
