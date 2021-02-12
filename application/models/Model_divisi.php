<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_divisi extends CI_model {

	public $table = "h_divisi";
	public function get()
	{
		return $this->db->get($this->table);
	}
}
