<div class="container">
	<div class="row">
		<!-- chart -->
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates quidem assumenda aperiam quibusdam maiores
		accusamus molestias, doloribus minima voluptatem sapiente, adipisci omnis error in pariatur non illo officiis,
		tempore delectus.
	</div>
	<div class="row">
		<!-- kd -->
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Kompetensi Dasar</div>
				<ul class="list-group">
					<?php foreach ($kd as $k) { ?>
					<a href="#" class="list-group-item list-group-item-action" data-idMapel="<?= $id_mapel ?>"
						data-idKelas="<?= $id_kelas ?>" data-idKd="<?= $k['id'] ?>"><?= $k['kd']; ?></a>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- siswa -->
		<div class="col-md-6 mb-3">
			<div class="card">
				<div class="card-header">Daftar Siswa</div>
				<div id="show_data"></div>
			</div>
		</div>
	</div>
</div>

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
		// tampilkan data default sebelum kd di klik oleh user
		showInfo();

		function showInfo() {
			info = `<ul class="list-group list-group-flush">
				<li class="media p-3">
					<h1><i class="fas fa-info-circle mr-2 text-warning"></i></h1>
					<div class="media-body">
					Silahkan <b>klik</b> salah satu daftar kompetensi dasar di samping dahulu untuk menampilkan daftar siswa.
					</div>
				</li>
				</ul>`;
			$('#show_data').html(info);
		}

		// tampilkan data siswa ketika kd sudah di klik oleh user
		$('.list-group-item').click(function () {
			var idKd = $(this).attr('data-idKd');
			var idMapel = $(this).attr('data-idMapel');
			var idKelas = $(this).attr('data-idKelas');
			$(this).addClass('');
			$.ajax({
				type: 'GET',
				url: '<?= base_url("nilai_pengetahuan/get_siswa")?>',
				dataType: 'JSON',
				data: {
					idKelas: idKelas,
					idMapel: idMapel,
					idKd: idKd
				},
				success: function (data) {
					// console.log(data)
					var html = '<form class="m-3" id="form_daftar_nilai">';
					var i;
					for (i = 0; i < data.length; i++) {
						html += `<div class="form-group row">
										<label for="id_siswa_` + data[i].id_siswa + `" class="col-sm-8 col-form-label">` + data[i].nama_siswa

						// cek apakah ada nilai yang kosong, jika ada tampilkan alert label
						if (data[i].nilai === null) {
							html +=
								`<i class="fas fa-exclamation-circle ml-1 text-danger"></i></label>`
						} else {
							html += `</label>`
						}

						html += `<div class="col-sm-4">
											<input type="number" class="form-control" 
												id="id_siswa_` + data[i].id_siswa + `" 
												name="nilai[]" value="` + data[i].nilai + `"
											min=0 max=100>
										</div>
								</div>`
					}
					html += `<div class="card-footer"><button class="btn btn-primary" id="submit-form">Simpan</button></div>`
					html += `</form>`

					$('#show_data').html(html);

				},
			});
			return false;
		})

		// jika tombol simpan di klik
		$("#submit-form").click(function () {
			console.log(('#form_daftar_nilai').serialize())
			$.ajax({
				url : '<?= base_url('nilai_pengetahuan/save'); ?>',
				type : 'post', //form method
				data : $('#form_daftar_nilai').serialize(),
				dataType : 'json', //misal kita ingin format datanya brupa json
				// beforeSend : function (data) {
				// 	//lakukan apasaja sambil menunggu proses selesai disini
				// 	//misal tampilkan loading

				// },
				success: function (result) {
					console.log(result)

				},
				error: function (error) {
					console.log(error)
				}
			})
		});

	});

</script>
