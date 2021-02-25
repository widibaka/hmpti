<?php 
/**
 * Logout
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->session->sess_destroy();
	}

	public function index()
	{
		redirect( base_url() );
	}
}