<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_proker extends CI_model {

	public $table = "h_proker";
	public function get_by_divisi($id_divisi)
	{
		$this->db->where("id_divisi", $id_divisi);
		return $this->db->get($this->table);
	}
}
