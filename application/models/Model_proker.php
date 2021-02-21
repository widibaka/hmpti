<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_proker extends CI_model {

	public $table = "h_proker";
	public function get_by_divisi($id_divisi)
	{
		$this->db->where("id_divisi", $id_divisi);
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where('id_proker', $post['id_proker']);
		$this->db->update($this->table, $post);
	}
	public function add($post, $id_divisi)
	{
		$post['id_divisi'] = $id_divisi;
		$this->db->insert($this->table, $post);
	}
	public function delete($id_proker)
	{
		$this->db->where('id_proker', $id_proker);
		$this->db->delete($this->table);
	}
}