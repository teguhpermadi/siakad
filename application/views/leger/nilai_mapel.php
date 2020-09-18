<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama Siswa</th>
			<th scope="col">NIS</th>
			<?php foreach($mapel as $m){ ?>
			<th scope="col"><?= $m['kode'] ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php
	$no = 1;
	foreach($siswa as $s){ ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $s['nama_siswa'] ?></td>
			<td><?= $s['nis'] ?></td>
			<?php foreach($mapel as $m){ 
				$nilai = $this->Leger_model->get_nilai_mapel($m['id'], $s['id']);
				?>
				<td scope="col"><?= $nilai['rerata_up'] ?></td>
			<?php }?>
		</tr>
		<?php } ?>
	</tbody>
</table>
