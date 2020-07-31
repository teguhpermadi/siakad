<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kompetensi Dasar</h1>
	</div>

	<!-- flash data -->
	<?php if($this->session->flashdata('berhasil')) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('hapus')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('hapus'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('warning')) { ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('warning'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- flash data -->
	<?php if($this->session->flashdata('berhasil_upload')) { ?>
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil_upload'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

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
			<div class="col-md-12 mb-3">
				<div class="card border-left-info">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-primary text-uppercase mb-1"><?= $m['nama_mapel']; ?>
								</div>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href='<?= base_url('kompetensi_dasar/add/'.$m['id_mapel']) ?>' type="button"
										class="btn btn-info">Tambah KD</a>
									<a href='<?= base_url('kompetensi_dasar/download/'.$m['id_mapel']) ?>' type="button"
										class="btn btn-info">Download KD</a>
									<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#upload" data-idmapel="<?= $m['id_mapel']; ?>">Upload KD</button> -->
									<button type="button" class="btn btn-info" data-idmapel="<?= $m['id_mapel']; ?>" data-namamapel="<?= $m['nama_mapel'] ?>" onclick="showModal(this)">Upload KD</button>
									<a href='<?= base_url('kompetensi_dasar/cetak/'.$m['id_mapel']) ?>' type="button" class="btn btn-info">Cetak KD</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<?php 
			$tingkat = $this->Kompetensi_dasar_model->get_tingkat($m['id_mapel']);
			echo($tingkat == null ? '<div class="col-md-12"><div class="alert alert-danger" role="alert">Belum ada Kompetensi Dasar untuk mata pelajaran ini.</div></div>' : '');
				foreach ($tingkat as $t) {
			?>
			<!-- tampilkan kd tiap tingkat kelasnya -->
			<!-- kd pengetahuan -->
			<div class="col-md-6 mb-3">
				<div class="card">
					<div class="card-header bg-gray-300 text-dark">
						KD Pengetahuan Tingkat Kelas <?= $t['tingkat']; ?>
						<div class="float-right">
							<span class="badge bg-gray-600 text-white"><?= $m['nama_mapel']; ?></span>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-striped table-light table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col" width="70%">Deskripsi KD</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- dapatkan kd pada masing2 mapel dan tingkat -->
								<?php
									$no = 1;
									$kd = $this->Kompetensi_dasar_model->get_kd($m['id_mapel'], $t['tingkat'], 'pengetahuan');
									foreach ($kd as $k) {
									?>
								<tr>
									<th scope="row"><?= $no++; ?></th>
									<td><?= $k['kd']; ?></td>
									<td>
										<a class='btn btn-sm btn-warning mb-1'
											href="<?= base_url('kompetensi_dasar/edit/'.$k['id']); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a class='btn btn-sm btn-danger mb-1'
											href="<?= base_url('kompetensi_dasar/remove/'.$k['id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="card-footer">
					<a href="#" class="btn btn-info btn-sm">Cetak</a>
					</div>
				</div>
			</div>

			<!-- kd keterampilan -->
			<div class="col-md-6 mb-3">
				<div class="card">
					<div class="card-header text-white bg-gray-600">
						KD Keterampilan Tingkat Kelas <?= $t['tingkat']; ?>

						<div class="float-right">
							<span class="badge bg-gray-300 text-dark"><?= $m['nama_mapel']; ?></span>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-striped table-light table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col" width="70%">Deskripsi KD</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- dapatkan kd pada masing2 mapel dan tingkat -->
								<?php
									$no = 1;
									$kd = $this->Kompetensi_dasar_model->get_kd($m['id_mapel'], $t['tingkat'], 'keterampilan');
									foreach ($kd as $k) {
									?>
								<tr>
									<th scope="row"><?= $no++; ?></th>
									<td><?= $k['kd']; ?></td>
									<td>
										<a class='btn btn-sm btn-warning mb-1'
											href="<?= base_url('kompetensi_dasar/edit/'.$k['id']); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
										<a class='btn btn-sm btn-danger mb-1'
											href="<?= base_url('kompetensi_dasar/remove/'.$k['id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php }; } ?>
	<!-- content row -->

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
				<h5 class="modal-title" id="exampleModalLabel">Upload KD</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('kompetensi_dasar/do_upload'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
				<div class="alert alert-warning" role="alert">
						<ul>
							<li>Pastikan Anda telah <b>Download KD</b> terlebih dahulu, kemudian isikan deskripsi kd
								yang diinginkan dibawah deskripsi kd yang sudah ada.</li>
							<li>Upload file yang sudah Anda tambahkan kompetensi dasarnya dari file <b>Download
									KD</b>
							</li>
						</ul>
					</div>

					<input type="hidden" name="id_mapel" id="id_mapel">
					<input type="hidden" name="nama_mapel" id="nama_mapel">
					<input type="hidden" name="id_kelas" >

					<div class="custom-file">
						<input type="file" name="userfile" id="userfile">
						<!-- <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01"
							name="userfile" size="20">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
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
function showModal(data){
	// tampilkan modalnya
	$('#upload').modal('show')
	// isi dengan data atribud yang ada
	var idMapel = data.getAttribute('data-idmapel');
	var namaMapel = data.getAttribute('data-namamapel');
	document.getElementById("id_mapel").value = idMapel;
	document.getElementById("nama_mapel").value = namaMapel;
}
</script>