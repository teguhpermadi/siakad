<div class="container">
	<div class="row">
		<!-- chart -->
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates quidem assumenda aperiam quibusdam maiores
		accusamus molestias, doloribus minima voluptatem sapiente, adipisci omnis error in pariatur non illo officiis,
		tempore delectus.
	</div>
	<div class="row">
		<!-- kd -->
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Kompetensi Dasar</div>
				<ul class="list-group">
					<?php foreach ($kd as $k) { ?>
					<a href="#" class="list-group-item list-group-item-action" data-idKd="<?= $k['id'] ?>"><?= $k['kd']; ?></a>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- siswa -->
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Daftar Siswa</div>
				<ul class="list-group list-group-flush">
					<div id="show_data"></div>
				</ul>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	// tampilkan data default sebelum kd di klik oleh user
	showInfo();

	function showInfo(){
		info = `<li class="media p-3">
					<h1><i class="fas fa-info-circle mr-2 text-warning"></i></h1>
					<div class="media-body">
					Silahkan klik salah satu daftar kompetensi dasar di samping dahulu untuk menampilkan daftar siswa.
					</div>
				</li>`;
		$('#show_data').html(info);
	}

	// tampilkan data siswa ketika kd sudah di klik oleh user
	$('.list-group-item').click(function(){
		alert('tes');
	});

});
</script>