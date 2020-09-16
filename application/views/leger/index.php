<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- page heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Leger</h1>
	</div>


	<div class="shadow p-3 mb-5 bg-white rounded">
		<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
					aria-controls="pills-home" aria-selected="true">Absensi dan Catatan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
					aria-controls="pills-profile" aria-selected="false">Nilai Sikap</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
					aria-controls="pills-contact" aria-selected="false">Nilai Mata Pelajaran</a>
			</li>
		</ul>


		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active shadow-sm p-3" id="pills-home" role="tabpanel"
				aria-labelledby="pills-home-tab">
                
                <!-- tombol cetak -->
                <div class="row m-1 mb-3">
					<button type="button" id="absensi_catatan" class="btn btn-info btn-icon-split">
						<span class="icon text-white-50">
							<i class="fas fa-print"></i>
						</span>
						<span class="text">Cetak</span>
					</button>
				</div>

				<!-- iframe absensi dan catatan -->
				<iframe id="print_absensi_catatan" frameborder="0" scrolling="yes" width="100%" src="<?= base_url('leger/absensi_catatan') ?>" height="400"></iframe>
			</div>
			<div class="tab-pane fade shadow-sm p-3" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                
                <!-- tombol cetak -->
                <div class="row m-1 mb-3">
					<button type="button" id="nilai_sikap" class="btn btn-info btn-icon-split">
						<span class="icon text-white-50">
							<i class="fas fa-print"></i>
						</span>
						<span class="text">Cetak</span>
					</button>
				</div>

				<!-- iframe nilai sikap -->
                <iframe id="print_nilai_sikap" frameborder="0" scrolling="yes" height="400" width="100%" src="<?= base_url('leger/nilai_sikap') ?>" ></iframe>
                
            </div>
			<div class="tab-pane fade shadow-sm p-3" id="pills-contact" role="tabpanel"
                aria-labelledby="pills-contact-tab">
                
                <!-- tombol cetak -->
                <div class="row m-1 mb-3">
					<button type="button" id="nilai_mapel" class="btn btn-info btn-icon-split">
						<span class="icon text-white-50">
							<i class="fas fa-print"></i>
						</span>
						<span class="text">Cetak</span>
					</button>
				</div>

				<!-- iframe nilai mapel -->
                <iframe id="print_nilai_mapel" frameborder="0" scrolling="yes" height="400" width="100%" src="<?= base_url('leger/nilai_mapel') ?>"></iframe>
                
            </div>
		</div>
	</div>

</div>

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<script>
    // cetak absensi
    $('#absensi_catatan').click(function(){        
        var frm = document.getElementById('print_absensi_catatan').contentWindow;
        frm.focus();// focus on contentWindow is needed on some ie versions
        frm.print();
        return false;
    })    

    // cetak nilai sikap
    $('#nilai_sikap').click(function(){        
        var frm = document.getElementById('print_nilai_sikap').contentWindow;
        frm.focus();// focus on contentWindow is needed on some ie versions
        frm.print();
        return false;
    })    

    // cetak nilai mapel
    $('#nilai_mapel').click(function(){        
        var frm = document.getElementById('print_nilai_mapel').contentWindow;
        frm.focus();// focus on contentWindow is needed on some ie versions
        frm.print();
        return false;
    })    
</script>
