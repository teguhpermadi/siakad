<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Nilai Pengetahuan</h1>
	</div>

	<?php if (empty($mapel)) { ?>
		<!-- jika data mapelnya kosong -->
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger fade show" role="alert">
					Tidak ada mata pelajaran yang Anda ajar, silahkan hubungi Administrator.
				</div>
			</div>
		</div>
		<?php } else {
		foreach ($mapel as $m) {
		?>
			<div>
				<!-- tampilkan nama mapelnya -->
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info fade show" role='alert'>
							<h4 class='text-uppercase font-weight-bold'><?= $m['nama_mapel']; ?></h4>
							<div class="d-flex flex-row bd-highlight">
								<div class="p-2 bd-highlight">
									<button class="btn btn-info btn-kkm" data-mapel="<?= $m['nama_mapel']; ?>" data-idmapel="<?= $m['id_mapel'] ?>">Atur KKM</button>
								</div>
								<div class="p-2 bd-highlight align-self-center show-kkm" id="show_kkm_id_mapel_<?= $m['id_mapel']; ?>">
									<?php
									$kkm = $this->Penilaian_model->get_kkm($m['id_mapel']);

									// cek kkm
									if ($kkm) {
										// echo json_encode($kkm);
										echo '<i class="fas fa-info-circle"></i>';
										for ($i = 0; $i < count($kkm); $i++) {
											echo ' <span class="mr-3"><b>KKM Tingkat ' . $kkm[$i]['tingkat'] . '</b> : ' . $kkm[$i]['kkm'] . '</span>';
										}
									} else {
										echo '<span class="text-danger"><i class="fas fa-info-circle"></i> <b>Mata pelajaran ini belum atur KKM</b><span>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- jika user tersebut wali kelas, tampilkan kelasnya -->
					<?php
					$walikelas = $this->Penilaian_model->get_kelas($m['id_mapel']);
					foreach ($walikelas as $w) {
						if ($w['id_kelas'] == user_info()['id_kelas']) {
					?>
							<div class="col-md-6">
								<div class="card shadow mb-4">
									<div class="card-header">
										<span class='text-uppercase'>Kelas <?= $w['nama_kelas']; ?></span>
										<span class="badge badge-primary float-right"><i class="fa fa-award mr-1"></i>Walikelas</span>
									</div>
									<div class="card-body">

										<!-- PIE CHART -->
										<canvas id="myChart-id_walikelas-<?= $w['id_kelas'] ?>"></canvas>

									</div>
									<div class="card-footer">
										<a href="<?= base_url('penilaian/do_nilai/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>" class='btn btn-primary'>Lakukan Penilaian</a>
										<!-- <a href="<?= base_url('penilaian/cetak/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>" class='btn btn-primary float-right' target="_blank">Cetak Penilaian</a> -->
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Pilihan
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
											<a class="dropdown-item" href="<?= base_url('penilaian/download/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>">Download Excel</a>
											<a class="dropdown-item" href="<?= base_url('penilaian/cetak/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>">Cetak</a>
										</div>
									</div>
								</div>
							</div>

					<?php }
					} ?>
				</div>

				<!-- tampilkan kelas yang lain -->
				<div class="row">
					<?php
					$walikelas = $this->Penilaian_model->get_kelas($m['id_mapel']);
					foreach ($walikelas as $w) {
						if ($w['id_kelas'] != user_info()['id_kelas']) {
					?>
							<div class="col-md-4">
								<div class="card shadow mb-4">
									<div class="card-header">
										<span class='text-uppercase'>Kelas <?= $w['nama_kelas']; ?></span>
									</div>
									<div class="card-body">

										<!-- PIE CHART -->
										<canvas id="myChart-id_kelas-<?= $w['id_kelas'] ?>"></canvas>

									</div>
									<div class="card-footer">
										<a href="<?= base_url('penilaian/do_nilai/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>" class='btn btn-primary'>Lakukan Penilaian</a>
										<!-- <a href="<?= base_url('penilaian/cetak/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>" class='btn btn-primary float-right' target="_blank">Cetak Penilaian</a> -->
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Pilihan
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
											<a class="dropdown-item" href="<?= base_url('penilaian/download/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>">Download Excel</a>
											<a class="dropdown-item" href="<?= base_url('penilaian/cetak/') . $m['id_mapel'] . '-' . $w['id_kelas']; ?>">Cetak</a>
										</div>
									</div>
								</div>
							</div>
					<?php }
					} ?>
				</div>
			</div>
	<?php };
	} ?>
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

<!-- Modal KKM -->
<div class="modal fade" id="kkmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-uppercase">KKM <span id="kkmModalTitle"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="kkmForm">
				<div class="modal-body">
					<div id="konten"></div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/vendor/chart.js/Chart.js'); ?>"></script>
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
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
					// console.log('total: ' + jml_kd + ', sudah: ' + sudah_dinilai + ', belum :' + belum_dinilai);

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
					// console.log('total: ' + jml_kd + ', sudah: ' + sudah_dinilai + ', belum :' + belum_dinilai);

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

	// tampilkan modal kkm
	$('.btn-kkm').click(function() {
		var nama_mapel = $(this).attr("data-mapel")
		var id_mapel = $(this).attr("data-idmapel")
		html = ''
		$.ajax({
			type: 'GET',
			url: '<?= base_url("penilaian/get_kkm/") ?>' + id_mapel,
			dataType: 'JSON',
			// data: {
			// 	kelas_tingkat: kelas_tingkat
			// },
			success: function(data) {
				// console.log(id_mapel)
				for (let i = 0; i < data['kelas_tingkat'].length; i++) {
					// cek kkm nya
					var kkm;
					if (data.kkm[i] != null) {
						kkm = data.kkm[i]['kkm']
					} else {
						kkm = ''
					}

					// tampilkan kelas tingkat dan kkmnya
					html += `<div class="form-group">
							<input type="hidden" name="id_mapel" value="` + id_mapel + `"/>
							<input type="hidden" name="tingkat[]" value="` + data.kelas_tingkat[i]['kelas_tingkat'] + `"/>
							<label>Kelas Tingkat ` + data.kelas_tingkat[i]['kelas_tingkat'] + `</label>
							<input class="form-control" type="number" name="kkm[]" min="0" max="100" value="` + kkm + `">
							</div>`
				}
				$('#konten').html(html)
			},
			error: function(error) {
				console.log(error)
			}
		});


		// set title modalnya
		$('#kkmModalTitle').text(nama_mapel)

		// tampilkan modalnya
		$('#kkmModal').modal('show')
	});

	$('#kkmForm').submit(function() {
		// setting sweetalert2
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 1500
		})

		$.ajax({
			url: '<?= base_url('penilaian/save_kkm') ?>',
			data: $(this).serialize(),
			type: "POST",
			success: function(data) {
				console.log(data)
				$('#kkmModal').modal('hide')
				// show sweetalert2
				Toast.fire({
					icon: 'success',
					title: 'Tersimpan'
				})
				setTimeout(
					function() {
						//do something special
						location.reload();
					}, 1000);
			}
		})
		return false;
	});
</script>