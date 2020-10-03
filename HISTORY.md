# SIAKAD
sistem informasi akademik dengan codeigniter
============================================
* 1.0.0 : instal codeigniter
* 2.0.0 : menghilangkan index.php dan menambahkan file .htaccess
* 3.0.0 : setting database
* 4.0.0 : setting autoload
* 5.0.0 : copy file assets
* 5.0.1 : gitignore folder assets
* 6.0.0 : instal phpspreatsheet
* 6.0.1 : gitignore folder vendor
* 7.0.0 : instal ion auth 3
* 8.0.0 : copy template sb-admin-2
* 9.0.0 : membuat halaman dashboard
  * 9.0.1 : menghitung jumlah siswa, guru, mapel, dan cek profil 
  * 9.0.2 : membuat session user dan menampilkan nama user
* 9.1.0 : membuat halaman profil
* 9.2.0 : membuat halaman tahun pelajaran
    * 9.2.1 : membuat session berdasarkan data user dan tahun pelajaran yang aktif
    * 9.2.2 : merapikan tampilan tahun pelajaran
* 9.3.0 : membuat halaman siswa
* 9.4.0 : membuat halaman kelas
* 9.5.0 : membuat halaman rombel
    * 9.5.1 : edit tampilan rombel
    * 9.5.2 : edit kelas rombel
    * 9.5.3 : edit kelas rombel dengan cara hapus semua anggota lama, kemudian ganti dengan anggota baru
* 9.6.0 : membuat halaman guru
* 9.7.0 : membuat halaman mapel
* 9.8.0 : membuat halaman users
* 9.9.0 : membuat halaman pengajar
  * 9.9.1 : membuat halaman tambah pengajar, edit tampilan halaman pengajar
  * 9.9.2 : fungsi halaman edit pengajar
  * versi 1 : cabang baru
      * 9.9.2.1 : membuat tabel pada seluruh mapel dan kelas ditambah dengan fungsi checklist agar bisa dihapus
* 9.10.0 : copy folder untuk donwload template excel dan upload data excel
  * 9.10.1 : setting config untuk load phpspreatsheet
* 9.11.0 : membuat halaman walikelas
  * 9.11.1 : edit halaman walikelas dengan fungsi javascript squery ajax
  * 9.11.2 : menampilkan data dengan ajax, dan menampilkan data by id dengan ajax
  * 9.11.3 : merapikan function pada 9.11.2
* 9.12.0 : edit tampilan user edit
* user_auth_rules : cabang baru
  * 9.13.0 : menambahkan helper dan fungsi cek user pada semua controller
  * 9.13.1 : edit list menu pada berdasarkan user role
  * 9.13.2 : edit fungsi tambahkan guru sebagai user
  * 9.13.3 : membuat halaman absensi
  * 9.13.4 : membenahi fungsi create dan update pada absensi menggunakan perintah INSERT ... ON DUPLICATE KEY UPDATE Statement
  * 9.13.5 : update database
  * 9.13.6 : membuat halaman catatan
  * 9.13.7 : tambah file loader baru untuk fungsi insert into on duplicate update dan membenahi halaman absensi dan catatan
  * 9.13.8 : merapikan helper dan membuat nilai sikap
  * 9.13.9 : merapikah tampilan nilai sikap
  * 9.13.10 : menggunakan google charts
  * 9.13.11 : merapikan file-file yang telah lalu
  * 9.13.12 : berhasil menampilkan data dengan chart js
  * 9.13.13 : download nilai sikap dalam excel
  * 9.13.14 : upload nilai sikap dalam excel
  * 9.13.15 : cetak nilai sikap
  * 9.13.16 : download, upload, cetak absensi. Perbaikan link upload excel guru dan excel siswa
  * 9.13.17 : nilai pengetahuan & keterampilan
  * 9.13.18 : kompetensi dasar
    * 9.13.18.1 : crud kompetensi dasar
    * 9.13.18.2 : download kompetensi dasar
    * 9.13.18.3 : download dan upload excel kompetensi dasar, rubah struktur database pada tabel kompetensi_dasar, rubah tampilan index kompetensi dasar agar lebih rapi
    * 9.13.18.4 : tambahkan aturan pada tahun pelajaran, bahwa hanya user role administrator yang bisa menambahkan tahun pelajaran baru, user role yang lain hanya bisa merubah tahun pelajaran aktif
    * 9.13.18.5 : cetak kompetensi dasar
* 9.14.0 : membuat nilai pengetahuan & keterampilan
* 9.14.1 : ajax nilai pengetahuan & keterampilan
* 9.14.2 : revisi nilai pengetahuan & keterampilan menjadi penilaian, perbaikan tampilan halaman penilaian
* 9.14.3 : download excel penilaian
* 9.14.4 : upload excel penilaian
* 9.14.5 : cetak penilaian
* 9.14.6 : chartjs di halaman index penilaian
* 9.14.7 : chartjs di halaman do_nilai penilaian
* 9.14.8 : gunakan randomcolor untuk generate warna chartjs, sumber : https://github.com/mistic100/RandomColor.php | lakukan instalasi via 'composer require mistic100/randomcolor'
* 9.14.9 : membuat garis vertikal pada charjs do_nilai penilaian sebagai tanda KKM
* 9.15.0 : revisi database, menambahkan tabel nilai
* 9.16.0 : install sweetalert2
* 9.17.0 : membuat kkm
* 9.17.1 : menampilkan kkm di chartjs do_nilai
* 9.18.0 : membuat leger
* 9.18.1 : leger absensi dan catatan
* 9.18.2 : leger nilai sikap
* 9.18.3 : leger nilai mata pelajaran
* 9.19.0 : perbaikan bug pada myhelper tentang user info
* 9.20.0 : tampilkan nama siswa untuk cetak rapor oleh walikelas
* 9.21.0 : install phpword
* 9.22.0 : download rapor doc
* 9.22.1 : download rapor pdf
* 9.22.2 : preview rapor html