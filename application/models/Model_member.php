<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_model {

	public $table = "h_member";
	public function get($id_jabatan)
	{
		$this->db->where('id_jabatan', $id_jabatan);
		return $this->db->get($this->table);
	}
}
