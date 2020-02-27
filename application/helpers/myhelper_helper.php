<?php defined('BASEPATH') OR exit('No direct script access allowed');

// fungsi untuk memeriksa apakah user sudah login
function check_login()
{
    // penganti $this
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

// fungsi untuk memeriksa data user
function user_info()
{
	// penganti $this
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

	switch($user_groups->name)
	{
		case 'admin' :
			$add_array = array('user_role' => 'administrator');
			return array_merge($data, $add_array);
		break;
		case 'guru' :
			// periksa apakah user tersebut sebagai guru dan walikelas pada tahun pelajaran yang aktif
			$ci->db->select('guru.nama_lengkap as nama_guru, kelas.nama as nama_walikelas');
			$ci->db->from('walikelas');
			$ci->db->where('walikelas.id_tahun', $_SESSION['id_tahun_pelajaran']);
			$ci->db->join('guru', 'guru.id = walikelas.id_guru');
			$ci->db->join('users', 'users.email = guru.email', 'inner');
			$ci->db->join('kelas', 'kelas.id = walikelas.id_kelas');
			$ci->db->where('users.email', $user->email);
			$db = $ci->db->get()->result_array();

			$add_array = array('user_role' => 'guru');
			return array_merge($data, $add_array, $db);
		break;
		case 'siswa':
			$add_array = array('user_role' => 'siswa');
			return array_merge($data, $add_array);
		break;
	}
	
}

function user_menu()
{
	// penganti $this
	$ci =& get_instance();

	// periksa usernya
	$user = $ci->ion_auth->user()->row(); // informasi data user
	$user_groups = $ci->ion_auth->get_users_groups($user->id)->row(); // informasi group user
	
	switch($user_groups->name)
	{
		case 'admin':
			$ci->load->view('template/menu_admin');
		break;
		case 'guru':
			// periksa apakah user tersebut sebagai guru dan walikelas pada tahun pelajaran yang aktif
			$ci->db->select('guru.nama_lengkap as nama_guru, kelas.nama as nama_walikelas');
			$ci->db->from('walikelas');
			$ci->db->where('walikelas.id_tahun', $_SESSION['id_tahun_pelajaran']);
			$ci->db->join('guru', 'guru.id = walikelas.id_guru');
			$ci->db->join('users', 'users.email = guru.email', 'inner');
			$ci->db->join('kelas', 'kelas.id = walikelas.id_kelas');
			$ci->db->where('users.email', $user->email);
			$db = $ci->db->get();
			$cek_walikelas = $db->num_rows();

			if($cek_walikelas > 0) {
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
