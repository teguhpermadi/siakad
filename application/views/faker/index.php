<div class="container">
    <div class="row">
        <div class="jumbotron">
            <div class="container">
                <h3>
                    Fungsi faker ini diperuntukkan bagi para developer yang ingin mengembangkan aplikasi ini lebih lanjut.
                </h3>
                <br>
                Ada 19 tabel yang disediakan didalam aplikasi ini klik tombol generate data untuk memulai mengisi data dengan data dummy
            </div>
        </div>

    </div>
</div>


<div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Tabel</td>
                    <td>Generate</td>
                </tr>
            </thead>
            <tbody>
                <!-- tabel admin -->
                <tr>
                    <td>1</td>
                    <td>users</td>
                    <td><a class="btn btn-primary" href="<?= base_url('faker/admin') ?>">Generate</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>groups</td>
                    <td><a class="btn btn-primary" href="<?= base_url('faker/groups') ?>">Generate</a></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>