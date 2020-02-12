<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Walikelas</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<button type='button' data-toggle="modal" data-target="#modal-tambah-walikelas"
				class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah walikelas</span>
			</button>
		</div>
	</div>

	<!-- flash data -->
	<?php if($this->session->flashdata('berhasil')) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('hapus')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('hapus'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<div class="row">
		<div class='col-md-12'>
			<div class="card">

				<div class="card-body">
					<table id="datatable-walikelas" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Kelas</th>
								<th>Walikelas</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody id="show_data"></tbody>

						<!-- <?php foreach($walikelas as $w){ ?>
						<tr>
							<td><?php echo $w['id_kelas']; ?></td>
							<td><?php echo $w['id_guru']; ?></td>
							<td>
								<a href="<?= base_url('walikelas/edit/'.$w['id']); ?>"
									class="btn btn-info btn-icon-split btn-sm">
									<span class="icon text-white-50">
										<i class="fas fa-book"></i>
									</span>
									<span class="text">Edit</span>
								</a>

								<a href="<?= base_url('walikelas/remove/'.$w['id']); ?>"
									class="btn btn-danger btn-icon-split btn-sm">
									<span class="icon text-white-50">
										<i class="fas fa-book"></i>
									</span>
									<span class="text">Hapus</span>
								</a>
							</td>
						</tr>
						<?php } ?> -->
						<tfoot>
							<tr>
								<th>Kelas</th>
								<th>Walikelas</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
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

<!-- Modal -->
<div class="modal fade" id="modal-tambah-walikelas" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-walikelas"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Walikelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label for="id_guru" class="col-md-12 control-label"><span
								class="text-danger">*</span>Guru</label>
						<div class="col-md-12">
							<select name="id_guru" id='id_guru' class="form-control">
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
							<select name="id_kelas" id='id_kelas' class="form-control">
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary" id='btn_simpan'>Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?= base_url()?>assets/vendor/jquery/jquery.js"></script>
<script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		tampil_data();

		// tampil data
		function tampil_data() {
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url('
				walikelas / tes ')?>',
				async: true,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td>' + data[i].id_kelas + '</td>' +
							'<td>' + data[i].id_guru + '</td>' +
							'<td>' +
								<a href="' + data[i].id + '"
									class="btn btn-info btn-icon-split btn-sm">
									<span class="icon text-white-50">
										<i class="fas fa-book"></i>
									</span>
									<span class="text">Edit</span>
								</a>
							</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
				}

			});
		}

		// Simpan data
		$('#btn_simpan').on('click', function () {
			var id_guru = $('#id_guru').val();
			var id_kelas = $('#id_kelas').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('walikelas/simpan'); ?>",
				dataType: "JSON",
				data: {
					id_guru: id_guru,
					id_kelas: id_kelas
				},
				success: function (data) {
					$('[name="id_guru"]').val("");
					$('[name="id_kelas"]').val("");
					$('#modal-tambah-walikelas').modal('hide');
					// tampil_data_barang();
				}
			});
			return false;
		});
	});

</script>
