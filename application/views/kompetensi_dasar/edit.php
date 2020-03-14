<?php echo form_open('kompetensi_dasar/edit/'.$kompetensi_dasar['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_tahun" class="col-md-4 control-label"><span class="text-danger">*</span>Tahun Pelajaran</label>
		<div class="col-md-8">
			<select name="id_tahun" class="form-control">
				<option value="">select tahun_pelajaran</option>
				<?php 
				foreach($all_tahun_pelajaran as $tahun_pelajaran)
				{
					$selected = ($tahun_pelajaran['id'] == $kompetensi_dasar['id_tahun']) ? ' selected="selected"' : "";

					echo '<option value="'.$tahun_pelajaran['id'].'" '.$selected.'>'.$tahun_pelajaran['tahun'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_tahun');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="id_mapel" class="col-md-4 control-label"><span class="text-danger">*</span>Mapel</label>
		<div class="col-md-8">
			<select name="id_mapel" class="form-control">
				<option value="">select mapel</option>
				<?php 
				foreach($all_mapel as $mapel)
				{
					$selected = ($mapel['id'] == $kompetensi_dasar['id_mapel']) ? ' selected="selected"' : "";

					echo '<option value="'.$mapel['id'].'" '.$selected.'>'.$mapel['nama_mapel'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_mapel');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="id_kelas" class="col-md-4 control-label"><span class="text-danger">*</span>Kelas</label>
		<div class="col-md-8">
			<select name="id_kelas" class="form-control">
				<option value="">select kelas</option>
				<?php 
				foreach($all_kelas as $kelas)
				{
					$selected = ($kelas['id'] == $kompetensi_dasar['id_kelas']) ? ' selected="selected"' : "";

					echo '<option value="'.$kelas['id'].'" '.$selected.'>'.$kelas['nama'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_kelas');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="id_guru" class="col-md-4 control-label"><span class="text-danger">*</span>Guru</label>
		<div class="col-md-8">
			<select name="id_guru" class="form-control">
				<option value="">select guru</option>
				<?php 
				foreach($all_guru as $guru)
				{
					$selected = ($guru['id'] == $kompetensi_dasar['id_guru']) ? ' selected="selected"' : "";

					echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['nama_lengkap'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_guru');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="ki" class="col-md-4 control-label"><span class="text-danger">*</span>Ki</label>
		<div class="col-md-8">
			<input type="text" name="ki" value="<?php echo ($this->input->post('ki') ? $this->input->post('ki') : $kompetensi_dasar['ki']); ?>" class="form-control" id="ki" />
			<span class="text-danger"><?php echo form_error('ki');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="kd" class="col-md-4 control-label"><span class="text-danger">*</span>Kd</label>
		<div class="col-md-8">
			<input type="text" name="kd" value="<?php echo ($this->input->post('kd') ? $this->input->post('kd') : $kompetensi_dasar['kd']); ?>" class="form-control" id="kd" />
			<span class="text-danger"><?php echo form_error('kd');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>