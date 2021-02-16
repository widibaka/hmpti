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
	public function id_to_divisi($id_divisi)
	{
		$this->db->where("id_divisi", $id_divisi);
		return $this->db->get($this->table)->row_array()['nama_divisi'];
	}
	public function edit($post)
	{
		$this->db->where("id_divisi", $post['id_divisi']);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
}
