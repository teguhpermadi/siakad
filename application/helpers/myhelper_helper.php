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
						// 'walikelas',
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
		'id' => $user->id,
		'ip_address' => $user->ip_address,
		'username' => $user->username,
		'password' => $user->password,
		'email' => $user->email,
		'first_name' => $user->first_name,
		'last_name' => $user->last_name,
		'company' => $user->company,
		'phone' => $user->phone,
		'user_id' => $user->id
	);

	// periksa apakah user tersebut sebagai guru dan walikelas pada tahun pelajaran yang aktif
	$ci->db->select('kelas.id as id_kelas, kelas.nama as nama_walikelas');
	$ci->db->from('walikelas');
	$ci->db->where('walikelas.id_tahun', $_SESSION['id_tahun_pelajaran']);
	$ci->db->join('guru', 'guru.id = walikelas.id_guru');
	$ci->db->join('users', 'users.email = guru.email', 'inner');
	$ci->db->join('kelas', 'kelas.id = walikelas.id_kelas');
	$ci->db->where('users.email', $user->email);
	$db = $ci->db->get();
	$data_guru = $db->result_array();
	$count_data = $db->num_rows();

	// tambahkan keterangan tentang group user
	switch($user_groups->name)
	{
		case 'admin' :
			$user_role = array('user_role' => 'administrator');
			return array_merge($data, $user_role);
		break;
		case 'guru' :
			$user_role = array('user_role' => 'guru');

			// berikan keterangan tentang walikelas
			if($count_data > 0) {
				$is_walikelas = array('is_walikelas' => 'yes');
			} else {
				$is_walikelas = array('is_walikelas' => 'no');
			};

			return array_merge($data, $user_role, $is_walikelas, $data_guru);
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
		case 'admin':
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
