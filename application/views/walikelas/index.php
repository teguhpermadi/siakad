<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Walikelas</h1>
	</div>

	<div class="row mb-4">
		<div class="col">
			<button type='button' data-toggle="modal" data-target="#add" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah walikelas</span>
			</button>
		</div>
	</div>

	<div id='show_alert'></div>

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


<!-- modal tambah walikelas -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add">Tambah Walikelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form name='add_form'>
			<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Guru</label>
						<select name="add_id_guru" id="add_id_guru" class="custom-select" require>
							<option selected>Pilih salah satu</option>
							<?php foreach($guru as $g){ ?>
							<option value="<?= $g['id']; ?>"><?= $g['nama_lengkap']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Kelas</label>
						<select name="add_id_kelas" id="add_id_kelas" class="custom-select" require>
							<option selected>Pilih salah satu</option>
							<?php foreach($kelas as $k){ ?>
							<option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" id='btn_add'>Simpan</button>
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
				url: '<?= base_url('walikelas/get_all_walikelas')?>',
				async: true,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td>' + data[i].nama_kelas + '</td>' +
							'<td>' + data[i].nama_guru + '</td>' +
							'<td>' +
							'<a href="javascript:;" class="btn btn-info btn-icon-split btn-sm item_edit" data="' +
							data[i].id +
							'"> <span class="icon text-white-50"><i class="fas fa-book"></i></span><span class="text">Edit</span></a>' +
							'</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
				}

			});
		}

		// simpan data
		$('#btn_add').on('click',function(){
			var id_kelas = $('#add_id_kelas').val();
			var id_guru = $('#add_id_guru').val();
			$.ajax({
			type : "POST",
			url  : "<?php echo base_url('walikelas/add')?>",
			dataType : "JSON",
			data : {id_kelas:id_kelas, id_guru:id_guru},
			success: function(data){
				$('[name = "add_id_kelas"]').val("");
				$('[name = "add_id_guru"]').val("");
				$(".modal-backdrop").remove();
				$('#add').modal('hide');
				// tampilkan datanya
				tampil_data();
				// tampilkan 
				var html = '';
				html += '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
						'Data walikelas berhasil ditambahkan' +
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
							'<span aria-hidden="true">&times;</span>'+
						'</button>' +
						'</div>';
				$('#show_alert').html(html);
			}
		});
		return false;
		});
	});

</script>
