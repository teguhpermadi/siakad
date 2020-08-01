<div class="container">

	<div class="d-flex justify-content-center">
		<h1 class="text-capitalize">Kompetensi Dasar <?= $mapel['nama'] ?></h1>
	</div>

	<div class="d-flex justify-content-center">
		<h3>Tahun Pelajaran <?= $_SESSION['tahun']; ?> / <?= $_SESSION['tahun']+1; ?></h3>
	</div>

	<div class="d-flex justify-content-center">
		<h4>Semester <?= $_SESSION['semester']; ?></h4>
	</div>

	<div class="d-flex justify-content-center">
		<p class="text-uppercase">Oleh: <?= user_info()['first_name'].' '.user_info()['last_name']; ?></p>
	</div>
	<!-- Divider -->
	<hr class="divider">

	<?php foreach ($tingkat as $t) { ?>

	<div class="row">
		<p class="text-uppercase font-weight-bold">Tingkat Kelas <?= $t['tingkat'] ?></p>
	</div>

	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Nomor</td>
					<td>Deskripsi</td>
					<td>Jenis</td>
				</tr>
			</thead>
			<tbody>
				<?php
                    $no = 1;
                    $kd = $this->Kompetensi_dasar_model->get_kd($mapel['id'], $t['tingkat'], null);
                    foreach ($kd as $k) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k['kd'] ?></td>
                        <td><?= $k['jenis'] ?></td>
                    </tr>
                    <?php } ?>
			</tbody>
		</table>
	</div>

	<?php } ?>
</div>

<script>
	window.onload = function () {
		window.print();
	};

</script>
