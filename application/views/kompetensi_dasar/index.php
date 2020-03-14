<div class="pull-right">
	<a href="<?php echo site_url('kompetensi_dasar/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Id Tahun</th>
		<th>Id Mapel</th>
		<th>Id Kelas</th>
		<th>Id Guru</th>
		<th>Ki</th>
		<th>Kd</th>
		<th>Actions</th>
    </tr>
	<?php foreach($kompetensi_dasar as $k){ ?>
    <tr>
		<td><?php echo $k['id']; ?></td>
		<td><?php echo $k['id_tahun']; ?></td>
		<td><?php echo $k['id_mapel']; ?></td>
		<td><?php echo $k['id_kelas']; ?></td>
		<td><?php echo $k['id_guru']; ?></td>
		<td><?php echo $k['ki']; ?></td>
		<td><?php echo $k['kd']; ?></td>
		<td>
            <a href="<?php echo site_url('kompetensi_dasar/edit/'.$k['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('kompetensi_dasar/remove/'.$k['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>