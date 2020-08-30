<style>
	/* untuk kursor kd */
	#example td:hover {
		cursor: pointer;
	}

	/* untuk spinner */
	#overlay {
		/* position: fixed; */
		position: absolute;
		top: 0;
		z-index: 100;
		width: 100%;
		height: 100%;
		display: none;
		background: rgba(0, 0, 0, 0.6);
	}

	.cv-spinner {
		height: 100%;
		display: flex;
		justify-content: center;
		/* margin-top: 10%; */
		align-items: center;
	}

	.spinner {
		width: 40px;
		height: 40px;
		border: 4px #ddd solid;
		border-top: 4px #2e93e6 solid;
		border-radius: 50%;
		animation: sp-anime 0.8s infinite linear;
	}

	@keyframes sp-anime {
		100% {
			transform: rotate(360deg);
		}
	}

	.is-hide {
		display: none;
	}

</style>

<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 text-uppercase">Penilaian <?= $nama_mapel ?> Kelas <?= $nama_kelas ?></h1>
	</div>

	<div class="row mb-3">
		<div class="col-md-12">
			<div class="btn-group" role="group" aria-label="Basic example">
				<a class="btn btn-secondary" href="<?= base_url('penilaian') ?>">Kembali</a>
				<a class="btn btn-secondary"
					href="<?= base_url('penilaian/download/'.$id_mapel.'-'.$id_kelas) ?>">Download Excel</a>
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#upload">Upload
					Excel</button>
				<button type="button" class="btn btn-secondary">Cetak Nilai</button>
			</div>
		</div>
	</div>

	<!-- flash data -->
	<?php if($this->session->flashdata('berhasil_upload')) { ?>
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil_upload'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('gagal_upload')) { ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('gagal_upload'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

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
				<div class="card-body">
					<?php 
					// jika tidak ada KD
					if(empty($kd_pengetahuan) && empty($kd_keterampilan)){
						echo '<div class="d-flex bd-highlight">
						<div class="p-2 flex-fill bd-highlight"><h3><i class="fa fa-exclamation-triangle text-warning"></i></h3></div>
						<div class="p-2 flex-fill bd-highlight">Silahkan <a class="font-weight-bold" href="'.base_url('kompetensi_dasar').'">Tambahkan</a> Kompetensi Dasar dahulu untuk mata pelajaran ini.</div>
						</div></div>';
					} else {
						echo '<table class="table table-hover m-0" id="example"><tbody>';

						// tampilkan kd pengetahuan
						foreach ($kd_pengetahuan as $k) {
							echo '<tr data-toggle="tooltip" data-placement="right" title="KD Pengetahuan"
							data-idMapel="'.$id_mapel.'" data-idKelas="'.$id_kelas.'" data-idKd="'.$k['id'].'">
									<td><p class="mb-0">'.$k['kd'].'</p></td>
								</tr>';
						}

						// tampilkan kd keterampilan
						foreach ($kd_keterampilan as $k) {
							echo '<tr data-toggle="tooltip" data-placement="right" title="KD Keterampilan"
							data-idMapel="'.$id_mapel.'" data-idKelas="'.$id_kelas.'" data-idKd="'.$k['id'].'">
									<td><p class="mb-0">'.$k['kd'].'</p></td>
								</tr>';
						}
						echo '</tbody></table>';
					} ?>

				</div>
				<div class="card-footer">
					<a class="btn btn-primary" href="<?= base_url('kompetensi_dasar') ?>">Tambah KD</a>
				</div>
			</div>
		</div>
		<!-- siswa -->
		<div class="col-md-6 mb-3">
			<div class="card">
				<!-- spinner -->
				<div id="overlay">
					<div class="cv-spinner">
						<span class="spinner"></span>
					</div>
				</div>
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

<!-- Modal -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Nilai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('penilaian/do_upload'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="custom-file">
						<input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
						<input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
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


<script>
	$(document).ready(function () {
		// tampilkan data default sebelum kd di klik oleh user
		showInfo();

		function showInfo() {
			info = `<div class="d-flex bd-highlight">
					<div class="p-2 flex-fill bd-highlight"><h3><i class="fa fa-exclamation-triangle text-warning"></i></h3></div>
					<div class="p-2 flex-fill bd-highlight">Silahkan <b>klik</b> salah satu daftar kompetensi dasar di samping dahulu untuk menampilkan daftar siswa.</div>
					</div>`
			$('#show_data').html(info);
			$('#submit').hide();
		};

		// tampilkan data siswa ketika kd sudah di klik oleh user
		$('tr').click(function () {
			// show spinner
			$("#overlay").fadeIn(300);

			var idKd = $(this).attr('data-idKd');
			var idMapel = $(this).attr('data-idMapel');
			var idKelas = $(this).attr('data-idKelas');
			$.ajax({
				type: 'GET',
				url: '<?= base_url("penilaian/get_siswa")?>',
				dataType: 'JSON',
				data: {
					idKelas: idKelas,
					idMapel: idMapel,
					idKd: idKd
				},
				success: function (data) {
					// hide spinner
					setTimeout(function () {
						$("#overlay").fadeOut(300);
					}, 500);
					// console.log(data)
					$('#id_kd').val(idKd)
					$('#submit').show();
					var html = ''
					var i;
					for (i = 0; i < data.length; i++) {
						html += `<div class="form-group row">
										<label class="col-sm-8 col-form-label">` + data[i].nama_siswa

						// cek apakah ada nilai yang kosong, jika ada tampilkan alert label
						// if (data[i].nilai === null || data[i].nilai == 0) {
						// 	html +=
						// 		`<i class="fas fa-exclamation-circle ml-1 text-danger"></i></label>`
						// } else {
						// 	html += `</label>`
						// }

						html += `</label><div class="col-sm-4">
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
			// setting sweetalert2
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 1500
			})
			$.ajax({
				url: '<?= base_url("penilaian/save"); ?>',
				type: 'POST',
				data: $('#form_nilai').serialize(),
				success: function (data) {
					// show sweetalert2
					Toast.fire({
						icon: 'success',
						title: 'Tersimpan'
					})
				},
				error: function (error) {
					alert('error!');
				}
			});
		});
	});

</script>
