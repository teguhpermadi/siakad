<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Nilai Sikap</h1>
	</div>

	<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
		<div class="btn-group mr-2" role="group" aria-label="First group">
			<a href="<?= base_url('nilai_sikap'); ?>" class="btn btn-secondary">Kembali</a>
		</div>
		<div class="btn-group mr-2" role="group" aria-label="Second group">
			<a href="<?= base_url('nilai_sikap/download/'.$id_kelas); ?>" class='btn btn-primary'>Download Excel</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">Upload Excel</button>
			<a type="button" href="<?= base_url('nilai_sikap/cetak/'.$id_kelas); ?>" target="_blank" class='btn btn-primary'>Cetak Nilai</a>
		</div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<?php echo form_open('nilai_sikap/simpan',array("class"=>"form-horizontal")); ?>
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary text-uppercase">Nilai Sikap Kelas <?= $kelas['nama']; ?></h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th width='50%'>Nama Lengkap</th>
						<th>Nilai</th>
				</thead>

				<?php foreach($siswa as $s){ ?>
				<tr>
					<td><?php echo $s['nama_siswa']; ?><input type="text" name='id_siswa[]'
							value='<?= $s['id_siswa']; ?>' hidden>
						<?php if( $s['nilai'] == 0){
						// jika siswa tersebut belum memiliki nilai
						echo '<span class="badge badge-danger float-right">Belum dinilai.</span>';
					} ?>
					</td>
					<td>
						<select name="nilai[]" class="custom-select">
							<option value='0' selected>Pilih...</option>
							<?php 
                            $ket = array(
                                '4'=> 'Sangat Baik',
                                '3'=> 'Baik',
                                '2' => 'Cukup',
                                '1' => 'Kurang Baik'
                            );

                            foreach($ket as $value => $display_text)
                            {
                                $selected = ($value == $s['nilai']) ? ' selected="selected"' : "";

                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            } 
                            ?>
						</select>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="card-footer">
			<button type="submit" class='btn btn-primary'>Simpan</button>
			<a href='<?= base_url('nilai_sikap'); ?>' class='btn btn-secondary'>Kembali</a>
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
				<h5 class="modal-title" id="exampleModalLabel">Upload Nilai Sikap Kelas <?= $kelas['nama']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('nilai_sikap/do_upload'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="custom-file">
					<input type="hidden" name="id_kelas" value="<?= $kelas['id']; ?>">
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
