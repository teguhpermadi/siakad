<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/multi-select.css'); ?>">

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Jadwal Pelajaran</h3>
				</div>
				<div class="card-body">
					<?php echo form_open('jadwal_pelajaran/add', array("class" => "form-horizontal")); ?>

					<div class="form-group">
						<label for="">Tahun Pelajaran</label>
						<input type="text" value='<?= $_SESSION['tahun'] ?>' class='form-control' name="id_tahun" readonly>
					</div>

					<div class="form-group">
						<label for="">Kelas</label>
						<select class="custom-select" name='id_kelas' id='id_kelas'>
							<?php foreach ($all_kelas as $k) { ?>
							<option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="">Daftar Mapel</label>
						<select class='searchable' multiple='multiple' name='id_mapel[]' id='id_mapel' required>
							<?php foreach ($all_mapel as $mapel) { ?>
							<option value='<?= $mapel['id']; ?>'><?= $mapel['nama']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a class="btn btn-secondary" href='<?= base_url('jadwal_pelajaran'); ?>'>Batal</a>
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

<script src="<?= base_url('assets/js/jquery.multi-select.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.quicksearch.js'); ?>"></script>


<script type="text/javascript">
	$('.searchable').multiSelect({
		selectableHeader: "<input type='text' class='form-control mb-1' autocomplete='off' placeholder='cari mapel'>",
		selectionHeader: "<input type='text' class='form-control mb-1' autocomplete='off' placeholder='cari mapel'>",
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
