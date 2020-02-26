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
}