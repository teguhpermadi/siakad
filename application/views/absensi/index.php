<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Absensi</h1>
	</div>

	<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
		<div class="btn-group mr-2" role="group" aria-label="Second group">
			<a href="<?= base_url('absensi/download/'); ?>" class='btn btn-primary'>Download Excel</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">Upload Excel</button>
			<a type="button" href="<?= base_url('absensi/cetak/'); ?>" target="_blank" class='btn btn-primary'>Cetak Nilai</a>
		</div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<?php echo form_open('absensi/simpan',array("class"=>"form-horizontal")); ?>
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Daftar Absensi Siswa Kelas <?php echo(user_info()['nama_kelas']); ?></h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th width='20%'>Sakit</th>
						<th width='20%'>Izin</th>
						<th width='20%'>Alpa</th>
				</thead>

				<?php foreach($absensi as $a){ ?>
				<tr>
					<td><?php echo $a['nama_siswa']; ?><input type="text" name='id_siswa[]' value='<?= $a['id_siswa']; ?>' hidden></td>
					<td><input type="text" name="sakit[]" class="form-control" placeholder="Sakit" value="<?php echo ($a['sakit'])? $a['sakit'] : '0'; ?>"></td>
					<td><input type="text" name="izin[]" class="form-control" placeholder="Izin" value="<?php echo ($a['izin'])? $a['izin'] : '0'; ?>"></td>
					<td><input type="text" name="alpa[]" class="form-control" placeholder="Alpa" value="<?php echo ($a['alpa'])? $a['alpa'] : '0'; ?>"></td>
				</tr>
				<?php } ?>
				<!-- <tfoot>
					<tr>
                    <th>Nama Lengkap</th>
						<th>Sakit</th>
						<th>Izin</th>
						<th>Alpa</th>
					</tr>
				</tfoot> -->
			</table>
		</div>
		<div class="card-footer">
		<button type="submit" class='btn btn-primary'>Simpan</button>
		</div>
		<?php echo form_close(); ?>
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
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Absensi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('absensi/do_upload'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="custom-file">
					<input type="hidden" name="id_kelas" >
						<input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01"
							name="userfile" size="20">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
