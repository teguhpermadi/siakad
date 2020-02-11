 <!-- Load librari/plugin jquery nya -->
 <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.js"></script>

 <!-- Begin Page Content -->
 <div class="container-fluid">

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
 			<div class="card shadow mb-4">
 				<div class="card-header py-3">
 					<h3 class="m-0 font-weight-bold text-primary">Mapel yang diajarkan</h3>
 				</div>
 				<div class="card-body">

 					<div class="box-body">
 						<form action="<?= base_url('pengajar/update_pengajar'); ?>" method="post" id='form_update_pengajar'>
 							<div class="mb-3">
 								<button type="submit" id="btn-delete" class='btn btn-danger'>Hapus</button>
 							</div>
 							<table id="datatable-mapel" class="table table-striped table-bordered" style="width:100%">
 								<thead>
 									<tr>
 										<th width='5%'><input name="select_all" value="1" id="example-select-all"
 												type="checkbox" /> Pilih</th>
 										<th>Nama Mapel</th>
 										<th>Kelas</th>
 										<th>Actions</th>
 									</tr>
 								</thead>

 								<?php 
							
							foreach($mapel as $m){ ?>
 								<tr>
 									<td><input type='checkbox' class='check-item' name='id[]' id='id'
 											value='<?= $m['id']?>' ></td>
 									<td><?php echo $m['nama_mapel']; ?></td>
 									<td><?php echo $m['nama_kelas']; ?></td>
 									<td>
 										<a href="<?= base_url('pengajar/remove/'.$m['id'].'/'.$m['id_guru']); ?>"
 											class="btn btn-danger btn-icon-split btn-sm">
 											<span class="icon text-white-50">
 												<i class="fas fa-book"></i>
 											</span>
 											<span class="text">Hapus</span>
 										</a>
 									</td>
 								</tr>
 								<?php } ?>
 								<tfoot>
 									<tr>
 										<th>Kelompok</th>
 										<th>Nama</th>
 										<th>kode</th>
 										<th>Actions</th>
 									</tr>
 								</tfoot>
 							</table>
 						</form>
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

 <script>
 	$(document).ready(function () {
 		var table = $('#datatable-mapel').DataTable();
 		// Handle click on "Select all" control
 		$('#example-select-all').on('click', function () {
 			// Check/uncheck all checkboxes in the table
 			var rows = table.rows({
 				'search': 'applied'
 			}).nodes();
 			$('input[type="checkbox"]', rows).prop('checked', this.checked);
 		});
 	});

 </script>
