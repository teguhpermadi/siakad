<!-- google charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">
		<?php if(empty($kelas)){ ?>
		<div class="col-md-12">
			<div class="alert alert-danger fade show" role="alert">
				Tidak ada kelas yang Anda ajar, silahkan hubungi Administrator.
			</div>
		</div>
		<?php } else { 
            foreach($kelas as $k) { 
		?>
		<div class='col-md-6'>
			<div class="card shadow mb-4">
				<div class="card-header text-uppercase">
					<?=$k['nama_kelas'] ?>
					<?php 
					if($k['id_kelas'] == user_info()['id_kelas']) {
						// jika anda walikelas pada kelas ini
						echo '<span class="badge badge-primary float-right">Walikelas</span>';
					}
					?>
				</div>
				<div class="card-body">
					<?php 
						$datas = $this->Nilai_sikap_model->cek_nilai_siswa($k['id_kelas']);
						print_r(json_encode($datas));
					 ?>
					<script type="text/javascript">
						google.charts.load('current', {
							'packages': ['corechart']
						});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {

							var data = google.visualization.arrayToDataTable([
								['Task', 'Hours per Day'],
								['Work', 11],
								['Eat', 2]
							]);


							var options = {
								title: 'My Daily Activities'
							};

							var chart = new google.visualization.PieChart(document.getElementById('piechart'));

							chart.draw(data, options);
						}
					</script>
					<div id="piechart"></div>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('nilai_sikap/do_nilai/'.$k['id_kelas']); ?>" class='btn btn-primary'>Lakukan
						Penilaian</a>
				</div>
			</div>
		</div>
		<?php }; } ?>
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
