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
				$data = $this->Nilai_sikap_model->cek_nilai_siswa($k['id_kelas']);

				// cek jumlah yang sudah dinilai
				if($data['jumlah_siswa_belum_dinilai'] = 0) {
					// semua siswa sudah dinilai
					$class = 'bg-primary';
				} else if($data['jumlah_siswa_belum_dinilai'] > 0 && $data['jumlah_siswa_belum_dinilai'] != $data['jumlah_siswa_rombel']) {
					// ada siswa yang belum dinilai
					$class = 'bg-warning';
				} else if($data['jumlah_siswa_belum_dinilai'] = $data['jumlah_siswa_rombel']) {
					// semua siswa belum dinilai
					$class = 'bg-danger';
				};
		?>
		<div class='col-md-6'>
			<div class="card shadow mb-4">
				<div class="card-header text-white <?= $class; ?>">
					<?=$k['nama_kelas'] ?>
				</div>
				<div class="card-body">
					<?php 
						$data = $this->Nilai_sikap_model->cek_nilai_siswa($k['id_kelas']);
						print_r($data);
					 ?>
				</div>
				<div class="card-footer">
				<a href="<?= base_url('nilai_sikap/do_nilai/'.$k['id_kelas']); ?>" class='btn btn-primary'>Lakukan Penilaian</a>
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
