<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detail_organisasi extends CI_model {

	public function get()
	{
		return $this->db->get('h_detail_organisasi');
	}
}
