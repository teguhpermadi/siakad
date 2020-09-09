<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama Siswa</th>
			<th scope="col">Sakit</th>
			<th scope="col">Izin</th>
			<th scope="col">Alpa</th>
			<th scope="col">Jumlah</th>
			<th scope="col">Keterangan</th>
			<th scope="col">catatan</th>
		</tr>
	</thead>
	<tbody>
        <?php 
        $no = 1;
        foreach ($absensi as $a ) { 
            ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $a['nama_siswa'] ?></td>
			<td><?= $a['sakit'] ?></td>
			<td><?= $a['izin'] ?></td>
			<td><?= $a['alpa'] ?></td>
			<td><?= $a['jumlah'] ?></td>
			<td><?php if($a['keterangan'] == 'Yes'){ echo 'NAIK KELAS'; }else{ echo 'TINGGAL KELAS'; }; ?></td>
			<td><?= $a['note'] ?></td>
        </tr>
        <?php } ?>
	</tbody>
</table>
