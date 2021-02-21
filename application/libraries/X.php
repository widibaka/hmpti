<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class X {

	public function harus_login($session)
	{
		if ( empty($session->userdata('email')) ) {
			$session->set_flashdata("msg", "error#Session sudah habis. Silakan login lagi.");
			redirect( base_url() . "login" );
		}
	}
}
