<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- cek datanya jika kosong -->
	<?php if ($num_rows == 0) : ?>
		<div class="alert alert-danger" role="alert">
			<p>Anda belum memasukan profil sekolah.</p><a href='<?= base_url('profil/add'); ?>' class='btn btn-primary'>Profil Sekolah</a>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class='col-md-12'>
			<?php foreach ($profil as $p) { ?>
				<div class="card">
					<img class="card-img-top" src="https://picsum.photos/1053/180">
					<div class="card-body">

						<div class="d-flex bd-highlight mb-3">
							<div class="mr-auto p-2 bd-highlight">
								<h1 class="text-uppercase text-primary"><?php echo $p['namaSekolah']; ?></h1>
							</div>
							<div class="p-2 bd-highlight">
								<img class="rounded float-right" src="<?= base_url('uploads/' . $p['logo']) ?>" alt="not found" height="150px">
							</div>
						</div>
					</div>
					<table class='table table-striped'>
						<tr>
							<td>NPSN</td>
							<td><?= $p['npsn']; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><?= $p['alamat']; ?></td>
						</tr>
						<tr>
							<td>Desa/Kelurahan</td>
							<td><?= $p['desaKelurahan']; ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td><?= $p['kecamatan']; ?></td>
						</tr>
						<tr>
							<td>Kota/Kabupaten</td>
							<td><?= $p['kabupatenKota']; ?></td>
						</tr>
						<tr>
							<td>Provinsi</td>
							<td><?= $p['provinsi']; ?></td>
						</tr>
						<tr>
							<td>Kode Pos</td>
							<td><?= $p['kodePos']; ?></td>
						</tr>
						<tr>
							<td>Telp</td>
							<td><?= $p['telp']; ?></td>
						</tr>
						<tr>
							<td>Website</td>
							<td><?= $p['website']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $p['email']; ?></td>
						</tr>
					</table>
					<div class="card-body">
						<a href="<?php echo site_url('profil/edit/' . $p['id']); ?>" class="btn btn-primary">Edit</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<!-- <div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Profil Listing</h3>
					<div class="box-tools">
						<a href="<?php echo site_url('profil/add'); ?>" class="btn btn-success btn-sm">Add</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>NamaSekolah</th>
							<th>Npsn</th>
							<th>BentukSekolah</th>
							<th>Alamat</th>
							<th>DesaKelurahan</th>
							<th>Kecamatan</th>
							<th>KabupatenKota</th>
							<th>Provinsi</th>
							<th>Rt</th>
							<th>Rw</th>
							<th>Dusun</th>
							<th>KodePos</th>
							<th>Lintang</th>
							<th>Bujur</th>
							<th>Actions</th>
						</tr>
						<?php foreach ($profil as $p) { ?>
						<tr>
							<td><?php echo $p['id']; ?></td>
							<td><?php echo $p['namaSekolah']; ?></td>
							<td><?php echo $p['npsn']; ?></td>
							<td><?php echo $p['bentukSekolah']; ?></td>
							<td><?php echo $p['alamat']; ?></td>
							<td><?php echo $p['desaKelurahan']; ?></td>
							<td><?php echo $p['kecamatan']; ?></td>
							<td><?php echo $p['kabupatenKota']; ?></td>
							<td><?php echo $p['provinsi']; ?></td>
							<td><?php echo $p['rt']; ?></td>
							<td><?php echo $p['rw']; ?></td>
							<td><?php echo $p['dusun']; ?></td>
							<td><?php echo $p['kodePos']; ?></td>
							<td><?php echo $p['lintang']; ?></td>
							<td><?php echo $p['bujur']; ?></td>
							<td>
								<a href="<?php echo site_url('profil/edit/' . $p['id']); ?>"
									class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
								<a href="<?php echo site_url('profil/remove/' . $p['id']); ?>"
									class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							</td>
						</tr>
						<?php } ?>
					</table>

				</div>
			</div>
		</div>
	</div> -->

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