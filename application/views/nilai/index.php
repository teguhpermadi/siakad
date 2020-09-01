<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Nilai Pengetahuan</h1>
	</div>

	<?php if(empty($mapel)){ ?>
	<!-- jika data mapelnya kosong -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger fade show" role="alert">
				Tidak ada mata pelajaran yang Anda ajar, silahkan hubungi Administrator.
			</div>
		</div>
	</div>
	<?php } else { 
            foreach($mapel as $m) { 
		?>
	<div>
		<!-- tampilkan nama mapelnya -->
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info fade show" role='alert'>
					<span class='text-uppercase font-weight-bold'><?= $m['nama_mapel']; ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- jika user tersebut wali kelas, tampilkan kelasnya -->
			<?php 
		$walikelas = $this->Penilaian_model->get_kelas($m['id_mapel']);
		foreach ($walikelas as $w) {
			if($w['id_kelas'] == user_info()['id_kelas'])
			{
		?>
			<div class="col-md-6">
				<div class="card shadow mb-4">
					<div class="card-header">
						<span class='text-uppercase'>Kelas <?= $w['nama_kelas']; ?></span>
						<span class="badge badge-primary float-right"><i class="fa fa-award mr-1"></i>Walikelas</span>
					</div>
					<div class="card-body">

						<!-- PIE CHART -->
						<canvas id="myChart-id_walikelas-<?=$w['id_kelas'] ?>"></canvas>

					</div>
					<div class="card-footer">
						<a href="<?= base_url('penilaian/do_nilai/').$m['id_mapel'].'-'.$w['id_kelas']; ?>"
							class='btn btn-primary'>Lakukan Penilaian</a>
						<a href="<?= base_url('penilaian/cetak/').$m['id_mapel'].'-'.$w['id_kelas']; ?>"
							class='btn btn-primary float-right'>Cetak Penilaian</a>
					</div>
				</div>
			</div>

			<?php }}?>
		</div>

		<!-- tampilkan kelas yang lain -->
		<div class="row">
			<?php 
		$walikelas = $this->Penilaian_model->get_kelas($m['id_mapel']);
		foreach ($walikelas as $w) {
			if($w['id_kelas'] != user_info()['id_kelas'])
			{
		?>
			<div class="col-md-4">
				<div class="card shadow mb-4">
					<div class="card-header">
						<span class='text-uppercase'>Kelas <?= $w['nama_kelas']; ?></span>
					</div>
					<div class="card-body">

						<!-- PIE CHART -->
						<canvas id="myChart-id_kelas-<?=$w['id_kelas'] ?>"></canvas>

					</div>
					<div class="card-footer">
						<a href="<?= base_url('penilaian/do_nilai/').$m['id_mapel'].'-'.$w['id_kelas']; ?>"
							class='btn btn-primary'>Lakukan Penilaian</a>
						<a href="<?= base_url('penilaian/cetak/').$m['id_mapel'].'-'.$w['id_kelas']; ?>"
							class='btn btn-primary float-right' target="blank">Cetak Penilaian</a>
					</div>
				</div>
			</div>
			<?php }}?>
		</div>
	</div>
	<?php }; } ?>
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
<script src="<?= base_url('assets/vendor/chart.js/Chart.js'); ?>"></script>
<script src="<?= base_url()?>assets/vendor/jquery/jquery.js"></script>
<script>
	// tampilkan data nilainya rombel_walikelas
	$.get('<?= base_url("penilaian/cek_nilai_kd_walikelas"); ?>')
		.done((data) => {
			// jika datanya berhasil di load
			Object.keys(data).forEach(
				id_kelas => {
					var id_kelasnya = data[id_kelas]['id_kelas']
					var jml_kd = data[id_kelas]['datanya']['jumlah'];
					var sudah_dinilai = data[id_kelas]['datanya']['sudah_dinilai'];
					var belum_dinilai = data[id_kelas]['datanya']['belum_dinilai'];
					console.log('total: ' + jml_kd + ', sudah: ' + sudah_dinilai + ', belum :' + belum_dinilai);

					var ctx = document.getElementById('myChart-id_walikelas-' + id_kelasnya).getContext('2d');
					var myPieChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: ["KD Sudah dinilai", "KD Belum dinilai"],
							datasets: [{
								data: [sudah_dinilai, belum_dinilai],
								backgroundColor: ['#4e73df', '#1cc88a'],
								hoverBackgroundColor: ['#2e59d9', '#17a673'],
								hoverBorderColor: "rgba(234, 236, 244, 1)",
							}],
						},
						options: {
							legend: {
								position: 'bottom'
							}
						},
					});
				}
			)
		})
		.fail(
			(console.error())
		);

	// tampilkan data nilainya tiap kelas yang diajar
	$.get('<?= base_url("penilaian/cek_nilai_kd"); ?>')
		.done((data) => {
			// jika datanya berhasil di load
			Object.keys(data).forEach(
				id_kelas => {
					var id_kelasnya = data[id_kelas]['id_kelas']
					var jml_kd = data[id_kelas]['datanya']['jumlah'];
					var sudah_dinilai = data[id_kelas]['datanya']['sudah_dinilai'];
					var belum_dinilai = data[id_kelas]['datanya']['belum_dinilai'];
					console.log('total: ' + jml_kd + ', sudah: ' + sudah_dinilai + ', belum :' + belum_dinilai);

					var ctx = document.getElementById('myChart-id_kelas-' + id_kelasnya).getContext('2d');
					var myPieChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: ["KD Sudah dinilai", "KD Belum dinilai"],
							datasets: [{
								data: [sudah_dinilai, belum_dinilai],
								backgroundColor: ['#4e73df', '#1cc88a'],
								hoverBackgroundColor: ['#2e59d9', '#17a673'],
								hoverBorderColor: "rgba(234, 236, 244, 1)",
							}],
						},
						options: {
							legend: {
								position: 'bottom'
							}
						},
					});
				}
			)
		})
		.fail(
			(console.error())
		);
</script>
