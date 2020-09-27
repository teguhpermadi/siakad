<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_base extends CI_Migration {

	public function up() {

		## Create Table absensi
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_siswa` int(255) NOT NULL ");
		$this->dbforge->add_field("`sakit` int(255) NOT NULL ");
		$this->dbforge->add_field("`izin` int(255) NOT NULL ");
		$this->dbforge->add_field("`alpa` int(255) NOT NULL ");
		$this->dbforge->create_table("absensi", TRUE);
		$this->db->query('ALTER TABLE  `absensi` ENGINE = InnoDB');
		## Create Table catatan
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_siswa` int(255) NOT NULL ");
		$this->dbforge->add_field("`keterangan` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`note` varchar(255) NOT NULL ");
		$this->dbforge->create_table("catatan", TRUE);
		$this->db->query('ALTER TABLE  `catatan` ENGINE = InnoDB');
		## Create Table groups
		$this->dbforge->add_field("`id` mediumint(8) unsigned NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(20) NOT NULL ");
		$this->dbforge->add_field("`description` varchar(100) NOT NULL ");
		$this->dbforge->create_table("groups", TRUE);
		$this->db->query('ALTER TABLE  `groups` ENGINE = InnoDB');
		## Create Table guru
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`nama_lengkap` varchar(255) NULL ");
		$this->dbforge->add_field("`jenis_kelamin` varchar(255) NULL ");
		$this->dbforge->add_field("`tempat_lahir` varchar(255) NULL ");
		$this->dbforge->add_field("`tanggal_lahir` varchar(255) NULL ");
		$this->dbforge->add_field("`nip` varchar(255) NULL ");
		$this->dbforge->add_field("`nik` varchar(255) NULL ");
		$this->dbforge->add_field("`nikk` varchar(255) NULL ");
		$this->dbforge->add_field("`alamat` varchar(255) NULL ");
		$this->dbforge->add_field("`gelar_depan` varchar(255) NULL ");
		$this->dbforge->add_field("`gelar_belakang` varchar(255) NULL ");
		$this->dbforge->add_field("`pendidikan_terakhir` varchar(255) NULL ");
		$this->dbforge->add_field("`email` varchar(255) NULL ");
		$this->dbforge->add_field("`telp` varchar(255) NULL ");
		$this->dbforge->create_table("guru", TRUE);
		$this->db->query('ALTER TABLE  `guru` ENGINE = InnoDB');
		## Create Table kelas
		$this->dbforge->add_field("`id` int(100) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`nama` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`kode_kelas` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`tingkat` varchar(255) NOT NULL ");
		$this->dbforge->create_table("kelas", TRUE);
		$this->db->query('ALTER TABLE  `kelas` ENGINE = InnoDB');
		## Create Table kompetensi_dasar
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_mapel` int(255) NOT NULL ");
		$this->dbforge->add_field("`tingkat` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_guru` int(255) NOT NULL ");
		$this->dbforge->add_field("`jenis` enum('pengetahuan','keterampilan','','') NULL DEFAULT 'pengetahuan' ");
		$this->dbforge->add_field("`kd` varchar(255) NOT NULL ");
		$this->dbforge->create_table("kompetensi_dasar", TRUE);
		$this->db->query('ALTER TABLE  `kompetensi_dasar` ENGINE = InnoDB');
		## Create Table kriteria_ketuntasan
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_mapel` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_guru` int(255) NOT NULL ");
		$this->dbforge->add_field("`tingkat` int(255) NOT NULL ");
		$this->dbforge->add_field("`kkm` int(255) NOT NULL ");
		$this->dbforge->create_table("kriteria_ketuntasan", TRUE);
		$this->db->query('ALTER TABLE  `kriteria_ketuntasan` ENGINE = InnoDB');
		## Create Table login_attempts
		$this->dbforge->add_field("`id` int(11) unsigned NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`ip_address` varchar(45) NOT NULL ");
		$this->dbforge->add_field("`login` varchar(100) NOT NULL ");
		$this->dbforge->add_field("`time` int(11) unsigned NULL ");
		$this->dbforge->create_table("login_attempts", TRUE);
		$this->db->query('ALTER TABLE  `login_attempts` ENGINE = InnoDB');
		## Create Table mapel
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`nama` varchar(255) NULL ");
		$this->dbforge->add_field("`kode` varchar(255) NULL ");
		$this->dbforge->add_field("`kelompok` varchar(255) NULL ");
		$this->dbforge->create_table("mapel", TRUE);
		$this->db->query('ALTER TABLE  `mapel` ENGINE = InnoDB');
		## Create Table migrations
		$this->dbforge->add_field("`version` bigint(20) NOT NULL ");
		$this->dbforge->create_table("migrations", TRUE);
		$this->db->query('ALTER TABLE  `migrations` ENGINE = InnoDB');
		## Create Table nilai
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_mapel` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_siswa` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_kd` int(255) NOT NULL ");
		$this->dbforge->add_field("`nilai` int(255) NOT NULL ");
		$this->dbforge->create_table("nilai", TRUE);
		$this->db->query('ALTER TABLE  `nilai` ENGINE = InnoDB');
		## Create Table nilai_sikap
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_guru` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_siswa` int(255) NOT NULL ");
		$this->dbforge->add_field("`nilai` int(255) NOT NULL ");
		$this->dbforge->create_table("nilai_sikap", TRUE);
		$this->db->query('ALTER TABLE  `nilai_sikap` ENGINE = InnoDB');
		## Create Table pengajar
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_guru` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_mapel` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_kelas` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->create_table("pengajar", TRUE);
		$this->db->query('ALTER TABLE  `pengajar` ENGINE = InnoDB');
		## Create Table profil
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`namaSekolah` varchar(255) NULL ");
		$this->dbforge->add_field("`npsn` varchar(255) NULL ");
		$this->dbforge->add_field("`bentukSekolah` varchar(255) NULL ");
		$this->dbforge->add_field("`alamat` varchar(255) NULL ");
		$this->dbforge->add_field("`desaKelurahan` varchar(255) NULL ");
		$this->dbforge->add_field("`kecamatan` varchar(255) NULL ");
		$this->dbforge->add_field("`kabupatenKota` varchar(255) NULL ");
		$this->dbforge->add_field("`provinsi` varchar(255) NULL ");
		$this->dbforge->add_field("`rt` varchar(255) NULL ");
		$this->dbforge->add_field("`rw` varchar(255) NULL ");
		$this->dbforge->add_field("`dusun` varchar(255) NULL ");
		$this->dbforge->add_field("`kodePos` varchar(255) NULL ");
		$this->dbforge->add_field("`lintang` varchar(255) NULL ");
		$this->dbforge->add_field("`bujur` varchar(255) NULL ");
		$this->dbforge->create_table("profil", TRUE);
		$this->db->query('ALTER TABLE  `profil` ENGINE = InnoDB');
		## Create Table rombel
		$this->dbforge->add_field("`id` int(100) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_kelas` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_siswa` int(255) NOT NULL ");
		$this->dbforge->create_table("rombel", TRUE);
		$this->db->query('ALTER TABLE  `rombel` ENGINE = InnoDB');
		## Create Table siswa
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`nama_lengkap` varchar(255) NULL ");
		$this->dbforge->add_field("`nama_panggilan` varchar(255) NULL ");
		$this->dbforge->add_field("`nis` varchar(255) NULL ");
		$this->dbforge->add_field("`nisn` varchar(255) NULL ");
		$this->dbforge->add_field("`nik` varchar(255) NULL ");
		$this->dbforge->add_field("`nikk` varchar(255) NULL ");
		$this->dbforge->add_field("`jenis_kelamin` varchar(255) NULL ");
		$this->dbforge->add_field("`tempat_lahir` varchar(255) NULL ");
		$this->dbforge->add_field("`tanggal_lahir` varchar(255) NULL ");
		$this->dbforge->add_field("`alamat` varchar(255) NULL ");
		$this->dbforge->add_field("`kelurahan` varchar(255) NULL ");
		$this->dbforge->add_field("`kecamatan` varchar(255) NULL ");
		$this->dbforge->add_field("`kota_kab` varchar(255) NULL ");
		$this->dbforge->add_field("`provinsi` varchar(255) NULL ");
		$this->dbforge->add_field("`kode_pos` varchar(255) NULL ");
		$this->dbforge->add_field("`agama` varchar(255) NULL ");
		$this->dbforge->add_field("`ayah` varchar(255) NULL ");
		$this->dbforge->add_field("`pekerjaan_ayah` varchar(255) NULL ");
		$this->dbforge->add_field("`penghasilan_ayah` varchar(255) NULL ");
		$this->dbforge->add_field("`ibu` varchar(255) NULL ");
		$this->dbforge->add_field("`pekerjaan_ibu` varchar(255) NULL ");
		$this->dbforge->add_field("`penghasilan_ibu` varchar(255) NULL ");
		$this->dbforge->add_field("`wali` varchar(255) NULL ");
		$this->dbforge->add_field("`pekerjaan_wali` varchar(255) NULL ");
		$this->dbforge->add_field("`penghasilan_wali` varchar(255) NULL ");
		$this->dbforge->add_field("`foto` varchar(255) NULL ");
		$this->dbforge->add_field("`tanggal_masuk` date NULL ");
		$this->dbforge->add_field("`aktif` tinyint(1) NULL ");
		$this->dbforge->add_field("`telp_siswa` varchar(255) NULL ");
		$this->dbforge->add_field("`telp_ayah` varchar(255) NULL ");
		$this->dbforge->add_field("`telp_ibu` varchar(255) NULL ");
		$this->dbforge->create_table("siswa", TRUE);
		$this->db->query('ALTER TABLE  `siswa` ENGINE = InnoDB');
		## Create Table tahun_pelajaran
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`tahun` varchar(255) NULL ");
		$this->dbforge->add_field("`semester` varchar(255) NULL ");
		$this->dbforge->add_field("`id_kepsek` int(255) NULL ");
		$this->dbforge->add_field("`tanggal_rapor` varchar(255) NULL ");
		$this->dbforge->create_table("tahun_pelajaran", TRUE);
		$this->db->query('ALTER TABLE  `tahun_pelajaran` ENGINE = InnoDB');
		## Create Table users
		$this->dbforge->add_field("`id` int(11) unsigned NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`ip_address` varchar(45) NOT NULL ");
		$this->dbforge->add_field("`username` varchar(100) NULL ");
		$this->dbforge->add_field("`password` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`email` varchar(254) NOT NULL ");
		$this->dbforge->add_field("`activation_selector` varchar(255) NULL ");
		$this->dbforge->add_field("`activation_code` varchar(255) NULL ");
		$this->dbforge->add_field("`forgotten_password_selector` varchar(255) NULL ");
		$this->dbforge->add_field("`forgotten_password_code` varchar(255) NULL ");
		$this->dbforge->add_field("`forgotten_password_time` int(11) unsigned NULL ");
		$this->dbforge->add_field("`remember_selector` varchar(255) NULL ");
		$this->dbforge->add_field("`remember_code` varchar(255) NULL ");
		$this->dbforge->add_field("`created_on` int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("`last_login` int(11) unsigned NULL ");
		$this->dbforge->add_field("`active` tinyint(1) unsigned NULL ");
		$this->dbforge->add_field("`first_name` varchar(50) NULL ");
		$this->dbforge->add_field("`last_name` varchar(50) NULL ");
		$this->dbforge->add_field("`company` varchar(100) NULL ");
		$this->dbforge->add_field("`phone` varchar(20) NULL ");
		$this->dbforge->create_table("users", TRUE);
		$this->db->query('ALTER TABLE  `users` ENGINE = InnoDB');
		## Create Table users_groups
		$this->dbforge->add_field("`id` int(11) unsigned NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`user_id` int(11) unsigned NOT NULL ");
		$this->dbforge->add_field("`group_id` mediumint(8) unsigned NOT NULL ");
		$this->dbforge->create_table("users_groups", TRUE);
		$this->db->query('ALTER TABLE  `users_groups` ENGINE = InnoDB');
		## Create Table walikelas
		$this->dbforge->add_field("`id` int(255) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`id_guru` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_kelas` int(255) NOT NULL ");
		$this->dbforge->add_field("`id_tahun` int(255) NOT NULL ");
		$this->dbforge->create_table("walikelas", TRUE);
		$this->db->query('ALTER TABLE  `walikelas` ENGINE = InnoDB');
	 }

	public function down()	{
		### Drop table absensi ##
		$this->dbforge->drop_table("absensi", TRUE);
		### Drop table catatan ##
		$this->dbforge->drop_table("catatan", TRUE);
		### Drop table groups ##
		$this->dbforge->drop_table("groups", TRUE);
		### Drop table guru ##
		$this->dbforge->drop_table("guru", TRUE);
		### Drop table kelas ##
		$this->dbforge->drop_table("kelas", TRUE);
		### Drop table kompetensi_dasar ##
		$this->dbforge->drop_table("kompetensi_dasar", TRUE);
		### Drop table kriteria_ketuntasan ##
		$this->dbforge->drop_table("kriteria_ketuntasan", TRUE);
		### Drop table login_attempts ##
		$this->dbforge->drop_table("login_attempts", TRUE);
		### Drop table mapel ##
		$this->dbforge->drop_table("mapel", TRUE);
		### Drop table migrations ##
		$this->dbforge->drop_table("migrations", TRUE);
		### Drop table nilai ##
		$this->dbforge->drop_table("nilai", TRUE);
		### Drop table nilai_sikap ##
		$this->dbforge->drop_table("nilai_sikap", TRUE);
		### Drop table pengajar ##
		$this->dbforge->drop_table("pengajar", TRUE);
		### Drop table profil ##
		$this->dbforge->drop_table("profil", TRUE);
		### Drop table rombel ##
		$this->dbforge->drop_table("rombel", TRUE);
		### Drop table siswa ##
		$this->dbforge->drop_table("siswa", TRUE);
		### Drop table tahun_pelajaran ##
		$this->dbforge->drop_table("tahun_pelajaran", TRUE);
		### Drop table users ##
		$this->dbforge->drop_table("users", TRUE);
		### Drop table users_groups ##
		$this->dbforge->drop_table("users_groups", TRUE);
		### Drop table walikelas ##
		$this->dbforge->drop_table("walikelas", TRUE);

	}
}