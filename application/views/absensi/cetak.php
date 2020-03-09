<div class="container">

	<div class="d-flex justify-content-center">
		<h1>Absensi Kelas <?= $kelas['nama']; ?></h1>
	</div>

	<div class="d-flex justify-content-center">
		<h3>Tahun Pelajaran <?= $_SESSION['tahun']; ?> / <?= $_SESSION['tahun']+1; ?></h3>
	</div>

	<div class="d-flex justify-content-center">
		<h4>Semester <?= $_SESSION['semester']; ?></h4>
	</div>

	<!-- Divider -->
	<hr class="divider">

	<div class="row">
		<p class="text-uppercase">Oleh: <?= user_info()['first_name'].' '.user_info()['last_name']; ?></p>
		<hr>
		<p class="text-uppercase">Kelas: <?= $kelas['nama']; ?></p>
	</div>

	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Nama Siswa</th>
					<th scope="col">Sakit</th>
					<th scope="col">Izin</th>
					<th scope="col">Alpa</th>
					<th scope="col">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php 
            $no = 1;
            foreach($absensi as $a) {?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $a['nama_siswa'] ?></td>
					<td><?= $a['sakit'] ?></td>
					<td><?= $a['izin'] ?></td>
					<td><?= $a['alpa'] ?></td>
					<td><?= $a['jumlah'] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	window.onload = function () {
		window.print();
	};
</script>
