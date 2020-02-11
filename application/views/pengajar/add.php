<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/multi-select.css'); ?>">

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Pengajar</h3>
				</div>
				<div class="card-body">
					<div class="box-body">
						<?php echo form_open('pengajar/add',array("class"=>"form-horizontal")); ?>
						<div class="row">

							<div class="col-sm-6 mb-3">
								<!-- kolom kiri -->
								<div class="form-group">
									<label for="id_tahun" class="col-md-12 control-label">Tahun Pelajaran</label>
									<div class="col-md-12">
										<input type="text" name="id_tahun"
											value="<?= $_SESSION['id_tahun_pelajaran'] ?>" id="id_tahun" hidden />
										<input type="text" value='<?= $_SESSION['tahun'] ?>' class="form-control"
											readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-md-12 control-label">Tahun Pelajaran</label>
									<div class="col-md-12">
										<input type="text" value='<?= $_SESSION['semester'] ?>' class="form-control"
											readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="id_guru" class="col-md-12 control-label">Guru</label>
									<div class="col-md-12">
										<select name="id_guru" class="form-control" required>
											<option value="">select guru</option>
											<?php 
                                                foreach($all_guru as $guru)
                                                {
                                                    $selected = ($guru['id'] == $this->input->post('id_guru')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['nama_lengkap'].'</option>';
                                                } 
                                                ?>
										</select>
									</div>
								</div>

                                <div class="form-group">
									<label for="id_mapel" class="col-md-12 control-label">Mapel</label>
									<div class="col-md-12">
										<select name="id_mapel" class="form-control" required>
											<option value="">select mapel</option>
											<?php 
                                                foreach($all_mapel as $mapel)
                                                {
                                                    $selected = ($mapel['id'] == $this->input->post('id_mapel')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$mapel['id'].'" '.$selected.'>'.$mapel['nama'].'</option>';
                                                } 
                                                ?>
										</select>
									</div>
								</div>

								
							</div>

							<div class="col-sm-6 mb-3">
								<!-- kolom kanan -->
								<div class="form-group">
									<label for="id_kelas" class="col-md-12 control-label">Kelas</label>
									<div class="col-md-12">
                                        <select class='searchable' multiple='multiple' name='id_kelas[]' id='id_kelas' required>
											<?php foreach($all_kelas as $kelas){ ?>
											    <option value='<?= $kelas['id']; ?>'><?= $kelas['nama']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?= base_url('pengajar') ?>" class='btn btn-secondary'>Batal</a>
							</div>
						</div>

						<?php echo form_close(); ?>
					</div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.multi-select.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.quicksearch.js'); ?>"></script>


<script type="text/javascript">
	$('.searchable').multiSelect({
		selectableHeader: "<input type='text' class='form-control mb-1' autocomplete='off' placeholder='cari kelas'>",
		selectionHeader: "<input type='text' class='form-control mb-1' autocomplete='off' placeholder='cari kelas'>",
		afterInit: function (ms) {
			var that = this,
				$selectableSearch = that.$selectableUl.prev(),
				$selectionSearch = that.$selectionUl.prev(),
				selectableSearchString = '#' + that.$container.attr('id') +
				' .ms-elem-selectable:not(.ms-selected)',
				selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

			that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
				.on('keydown', function (e) {
					if (e.which === 40) {
						that.$selectableUl.focus();
						return false;
					}
				});

			that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
				.on('keydown', function (e) {
					if (e.which == 40) {
						that.$selectionUl.focus();
						return false;
					}
				});
		},
		afterSelect: function () {
			this.qs1.cache();
			this.qs2.cache();
		},
		afterDeselect: function () {
			this.qs1.cache();
			this.qs2.cache();
		}
	});

</script>
