<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Catatan</h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<?php echo form_open('catatan/simpan',array("class"=>"form-horizontal")); ?>
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Daftar Catatan Siswa Kelas <?php echo(user_info()[0]['nama_kelas']); ?></h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th width='15%'>Keterangan</th>
						<th width='50%'>Catatan</th>
				</thead>

				<?php foreach($catatan as $c){ ?>
				<tr>
					<td><?php echo $c['nama_siswa']; ?><input type="text" name='id_siswa[]' value='<?= $c['id_siswa']; ?>'></td>
					<td>
                        <select name="keterangan[]" class="custom-select">
                            <!-- <option selected>Pilih...</option> -->
                            <?php 
                            $ket = array(
                                'Yes'=>'Naik',
                                'No'=>'Tidak',
                            );

                            foreach($ket as $value => $display_text)
                            {
                                $selected = ($value == $c['keterangan']) ? ' selected="selected"' : "";

                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                            } 
                            ?>
                        </select>
                    </td>
					<td><input type="text" name="note[]" class="form-control" placeholder="catatan" value="<?php echo ($c['note'])? $c['note'] : '-'; ?>"></td>
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
