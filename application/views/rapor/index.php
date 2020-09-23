<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Cetak Rapor</h1>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<table class="table table-hover">
					<tbody>
						<?php foreach($siswa as $s){ ?>
						<tr>
							<td><?= $s['nama_siswa'] ?></td>
							<td><?= $s['nis'] ?></td>
							<td class="text-center">
								<div class="btn-group" role="group" aria-label="Basic example">
									<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#previewModal" data-idsiswa="<?= $s['id'] ?>">Preview</button>
									<a class="btn btn-info btn-sm"  href="<?= base_url('rapor/download_doc/'.$s['id']) ?>" >Download DOC</a>
									<a class="btn btn-info btn-sm" href="<?= base_url('rapor/download_pdf/'.$s['id']) ?>">Download PDF</a>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
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

