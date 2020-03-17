<?php defined('BASEPATH') OR exit('No direct script access allowed');

// fungsi untuk memeriksa apakah user sudah login
function check_login()
{
    // penganti $ci
    $ci =& get_instance();

    if (!$ci->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		} 
	else
		{
			// periksa usernya
			$user = $ci->ion_auth->user()->row(); // informasi data user
			$user_groups = $ci->ion_auth->get_users_groups($user->id)->row(); // informasi group user
			$url = $ci->uri->segment(1);

			switch($user_groups->name)
			{
				case 'admin':
					// jika sebagai admin, url yg boleh diakses sebagai berikut
					$url_allowed = [
						'',
						'dashboard',
						'guru',
						'kelas',
						'mapel',
						'pengajar',
						'profil',
						'rombel',
						'siswa',
						'tahun_pelajaran',
						'users',
						'walikelas'
					];
				break;

				case 'guru':
					// jika sebagai guru, url yg boleh diakses sebagai berikut
					$url_allowed = [
						'',
						'dashboard',
						'profil',
						'tahun_pelajaran',
						'catatan',
						'nilai_sikap',
						'nilai_pengetahuan',
						'nilai_keterampilan',
						'kompetensi_dasar',
						'pengajar'
					];

				break;

				case 'siswa':
					// jika sebagai siswa, url yg boleh diakses sebagai berikut
					$url_allowed = [
						'',
						'dashboard',
						'profil',
						'tahun_pelajaran',
					];
				break;
			}

			// jika $url tidak ada dalam daftar $url_allowed, maka alihkan halaman
			if(!in_array($url, $url_allowed))
			{
				redirect('page403');
			}
		}
}

// fungsi untuk membuat session tahun pelajaran
function set_tahun_aktif()
{
	// penganti $this
	$ci =& get_instance();

	// cek session dan buat session
	if(empty($_SESSION['id_tahun_pelajaran'])){
		// setting tahun pelajarannya secara default
		$tahun_pelajaran = $ci->db->query('SELECT * FROM tahun_pelajaran ORDER BY tahun DESC LIMIT 1')->row_array();

		$userData = array(
			'id_tahun_pelajaran' => $tahun_pelajaran['id'],
			'tahun' => $tahun_pelajaran['tahun'],
			'semester' => $tahun_pelajaran['semester'],
			'id_kepsek' => $tahun_pelajaran['id_kepsek'],
			'tanggal_rapor' => $tahun_pelajaran['tanggal_rapor']
		);
		$ci->session->set_userdata($userData);
	}
}

// fungsi untuk memeriksa data user
function user_info()
{
	// penganti $ci
	$ci =& get_instance();
	
	// periksa usernya
	$user = $ci->ion_auth->user()->row(); // informasi data user
	$user_groups = $ci->ion_auth->get_users_groups($user->id)->row(); // informasi group user

	$data = array(
		// 'id' => $user->id,
		// 'ip_address' => $user->ip_address,
		'username' => $user->username,
		// 'password' => $user->password,
		'email' => $user->email,
		'first_name' => $user->first_name,
		'last_name' => $user->last_name,
		// 'company' => $user->company,
		// 'phone' => $user->phone,
		'user_id' => $user->id
	);

	// periksa user tersebut sebagai guru
	$ci->db->select('guru.id as id_guru');
	$ci->db->from('guru');
	$ci->db->where('email', $user->email);
	$data_guru = $ci->db->get()->row();

	// tambahkan keterangan tentang group user
	switch($user_groups->name)
	{
		case 'admin' :
			$user_role = array('user_role' => 'administrator');
			return array_merge($data, $user_role);
		break;
		case 'guru' :
			// periksa guru sebagai walikelas
			$ci->db->select('walikelas.id_kelas as id_kelas, kelas.nama as nama_kelas');
			$ci->db->from('walikelas');
			$ci->db->where('walikelas.id_tahun', $_SESSION['id_tahun_pelajaran']);
			$ci->db->where('walikelas.id_guru', $data_guru->id_guru);
			$ci->db->join('kelas', 'kelas.id = walikelas.id_kelas');
			$data_walikelas = $ci->db->get()->row();
	
			$user_role = array('user_role' => 'guru');

			// berikan keterangan tentang walikelas
			if($data_walikelas) {
				$is_walikelas = array(
					'id_guru' => $data_guru->id_guru,
					'is_walikelas' => 'yes',
					'id_kelas' => $data_walikelas->id_kelas,
					'nama_kelas' => $data_walikelas->nama_kelas
				);
			} else {
				$is_walikelas = array(
					'is_walikelas' => 'no',
					'id_guru' => $data_guru->id_guru,
				);
			};
			return array_merge($data, $user_role, $is_walikelas);
		break;
		case 'siswa':
			$user_role = array('user_role' => 'siswa');
			return array_merge($data, $user_role);
		break;
	}
	
}

function user_menu()
{
	// penganti $ci
	$ci =& get_instance();

	switch(user_info()['user_role'])
	{
		case 'administrator':
			$ci->load->view('template/menu_admin');
		break;
		case 'guru':
			// periksa apakah user tersebut sebagai guru dan walikelas pada tahun pelajaran yang aktif
			if(user_info()['is_walikelas'] == 'yes') {
				$ci->load->view('template/menu_guru');
				$ci->load->view('template/menu_walikelas');
			} else {
				$ci->load->view('template/menu_guru');
			}
		break;
		case 'siswa':
		break;
	}
}

function konversi_nilai_sikap($value)
{
	switch($value)
	{
		case null :
			return 'Belum dinilai';
		break;
		case '0' :
			return 'Belum dinilai';
		break;
		case '1' :
			return 'Kurang Baik';
		break;
		case '2' :
			return 'Cukup Baik';
		break;
		case '3' :
			return 'Baik';
		break;
		case '4' :
			return 'Sangat Baik';
		break;
	}
}
