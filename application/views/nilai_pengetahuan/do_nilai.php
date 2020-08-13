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
				<form id="form_nilai" name="form_nilai">
					<div class="card-body">
					<input type="hidden" name="id_mapel" id="id_mapel" value="<?= $id_mapel; ?>">
					<input type="hidden" name="id_kd" id="id_kd">
						<div id="show_data"></div>
					</div>
					<div class="card-footer"><button type="button" class="btn btn-primary" id="submit">Simpan</button>
					</div>
				</form>
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
			// info = `Silahkan <b>klik</b> salah satu daftar kompetensi dasar di samping dahulu untuk menampilkan daftar siswa.`;
			info = `<div class="d-flex bd-highlight">
					<div class="p-2 flex-fill bd-highlight"><h3><i class="fa fa-exclamation-triangle text-warning"></i></h3></div>
					<div class="p-2 flex-fill bd-highlight">Silahkan <b>klik</b> salah satu daftar kompetensi dasar di samping dahulu untuk menampilkan daftar siswa.</div>
					</div>`
			$('#show_data').html(info);
			$('#submit').hide();
		};

		// tampilkan data siswa ketika kd sudah di klik oleh user
		$('.list-group-item').click(function () {
			var idKd = $(this).attr('data-idKd');
			var idMapel = $(this).attr('data-idMapel');
			var idKelas = $(this).attr('data-idKelas');
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
					$('#id_kd').val(idKd)
					$('#submit').show();
					var html = ''
					var i;
					for (i = 0; i < data.length; i++) {
						html += `<div class="form-group row">
										<label class="col-sm-8 col-form-label">` + data[i].nama_siswa

						// cek apakah ada nilai yang kosong, jika ada tampilkan alert label
						if (data[i].nilai === null) {
							html +=
								`<i class="fas fa-exclamation-circle ml-1 text-danger"></i></label>`
						} else {
							html += `</label>`
						}

						html += `<div class="col-sm-4">
											<input name="id_siswa[]" type="hidden" value="` + data[i].id_siswa + `">
											<input type="number" class="form-control" name="nilai[]" `

						// cek apakah nilai tersebut null, jika iya setting jadi 0, jika tidak tampilkan apa adanya
						if (data[i].nilai === null) {
							html += `value="0" min=0 max=100 required>`
						} else {
							html += `value="` + data[i].nilai + `" min=0 max=100 required>`
						}

						html += `</div></div>`
					}
					html += ``
					$('#show_data').html(html);

				},
			});
			return false;
		});

		$('#submit').click(function () {
			$.ajax({
			url: '<?= base_url("nilai_pengetahuan/save"); ?>',
			type: 'post',
			data: $('#form_nilai').serialize(),
			success: function(data){ 
				alert('tersimpan');
			},
			error: function(error){
				alert('error!');
			}
			});
		});
	});

</script>
