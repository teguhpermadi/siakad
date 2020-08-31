<div class="container">

	<div class="d-flex justify-content-center">
		<h1 class="text-uppercase">Nilai <?= $mapel['nama']; ?> Kelas <?= $kelas['nama']; ?></h1>
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
					<th scope="col">NIS</th>
					<th scope="col">Rerata</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                $no = 1;
                foreach($avg as $a) {
                ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $a['nama_siswa']; ?></td>
					<td><?= $a['nis']; ?></td>
					<td><?= round($a['rerata']); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

    <!-- <div style="page-break-before:always;">

	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Nama Siswa</th>
					<th scope="col">NIS</th>
					<?php
                        $no_kd = 1;
                        foreach($kd as $k) {
                    ?>
					<th scope="col"><?= $no_kd++; ?></th>
					<?php }?>
				</tr>
			</thead>
			<tbody>
				<?php 
                $no = 1;
                foreach($siswa as $s) {
                ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $s['nama_lengkap']; ?></td>
					<td><?= $s['nis']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="row">
		Keterangan Daftar KD:
		<ol>
			<?php
                $no_kd = 1;
                foreach($kd as $k) {
            ?>
            <li><?= $k['kd'] ?></li>
			<?php }?>

		</ol>
	</div> -->
</div>

<script>
	window.onload = function () {
		window.print();
	};

</script>
