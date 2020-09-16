<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama Siswa</th>
			<th scope="col">NIS</th>
			<th scope="col">Nilai Sikap</th>
		</tr>
	</thead>
	<tbody>
        <?php 
        $no = 1;
        foreach ($nilai_sikap as $n ) { 
            ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $n['nama_lengkap'] ?></td>
			<td><?= $n['nis'] ?></td>
            <td><?= konversi_nilai_sikap($n['rerata_up']); ?></td>
        </tr>
        <?php } ?>
	</tbody>
</table>
