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

	return $data = array(
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
			$ci->load->view('template/menu_guru');
		break;
		case 'siswa':
		break;
	}
}
