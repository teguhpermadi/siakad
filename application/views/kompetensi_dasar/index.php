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
	<?php if($this->session->flashdata('berhasil_upload')) { ?>
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('berhasil_upload'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>

	<!-- DataTales Example -->
	<!-- <div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Daftar kelas</h6>
		</div>
		<div class="card-body">
			<table id="datatable-kelas" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Id Mapel</th>
						<th>Id Kelas</th>
						<th>Kd</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($kompetensi_dasar as $kd){ ?>
					<tr>
						<td><?php echo $kd['id_mapel']; ?></td>
						<td><?php echo $kd['id_kelas']; ?></td>
						<td><?php echo $kd['kd']; ?></td>
						<td>
							<a href="<?php echo site_url('kompetensi_dasar/edit/'.$kd['id']); ?>"
								class="btn btn-info btn-xs">Edit</a>
							<a href="<?php echo site_url('kompetensi_dasar/remove/'.$kd['id']); ?>"
								class="btn btn-danger btn-xs">Delete</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Id Mapel</th>
						<th>Id Kelas</th>
						<th>Kd</th>
						<th>Actions</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div> -->

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
									<button type="button" class="btn btn-info">Tambah KD</button>
									<button type="button" class="btn btn-info">Download Excel</button>
									<button type="button" class="btn btn-info">Upload Excel</button>
									<button type="button" class="btn btn-info">Cetak KD</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<!-- tampilkan kd tiap tingkat kelasnya -->
			<div class="col-md-12">
				<table class="table table-hover table-light">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col" width="80%">Deskripsi KD</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore quas tempora voluptatibus, illum facere animi ea voluptates molestiae odit tempore inventore quia aperiam consequuntur natus. Consequuntur sed doloremque quidem praesentium?</td>
							<td>
								<button class='btn btn-sm btn-warning'>Edit</button>
								<button class='btn btn-sm btn-danger'>Hapus</button>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt dignissimos voluptatibus assumenda ducimus natus provident totam dolor cumque ipsam iusto laborum odio sed repudiandae nobis, aperiam illo nesciunt odit quam.</td>
							<td>
								<button class='btn btn-sm btn-warning'>Edit</button>
								<button class='btn btn-sm btn-danger'>Hapus</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
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
