<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_divisi extends CI_model {

	public $table = "h_divisi";
	public function get()
	{
		return $this->db->get($this->table);
	}
	public function get_tunggal($id_divisi)
	{
		$this->db->where("id_divisi", $id_divisi);
		return $this->db->get($this->table);
	}
}
