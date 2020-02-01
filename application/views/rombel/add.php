<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/multi-select.css'); ?>">

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Rombel</h3>
				</div>
				<div class="card-body">
					<?php echo form_open('rombel/add',array("class"=>"form-horizontal")); ?>
					<div class="form-group">
						<select name="id_tahun" id='id_tahun' class="form-control">
							<option value="">select tahun_pelajaran</option>
							<?php 
							foreach($all_tahun_pelajaran as $tahun_pelajaran)
							{
								$selected = ($tahun_pelajaran['id'] == $this->input->post('id_tahun')) ? ' selected="selected"' : "";

								echo '<option value="'.$tahun_pelajaran['id'].'" '.$selected.'>'.$tahun_pelajaran['tahun'].'</option>';
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<select class="custom-select" name='id_kelas' id='id_kelas'>
							<?php foreach($kelas as $k) {?>
							<option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
							<?php }?>
						</select>
					</div>
					<div class="form-group">
						<select class='searchable' multiple='multiple' name='id_siswa[]' id='id_siswa'>
							<?php foreach($siswa as $m){ ?>
							<option value='<?= $m['id']; ?>'><?= $m['nama_lengkap']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class='btn btn-primary'>Simpan</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.multi-select.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.quicksearch.js'); ?>"></script>


<script type="text/javascript">
	$('.searchable').multiSelect({
		selectableHeader: "<input type='text' class='form-control mb-1' autocomplete='off' placeholder='try \"12\"'>",
		selectionHeader: "<input type='text' class='form-control mb-1' autocomplete='off' placeholder='try \"4\"'>",
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
