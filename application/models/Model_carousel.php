<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_carousel extends CI_model {

	public $table = "h_carousel";
	public function get()
	{
		return $this->db->get($this->table);
	}
}
