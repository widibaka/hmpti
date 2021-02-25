<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_panitia extends CI_model {

	public $table = "h_panitia";
	public function get_by_id_event($id_event)
	{
		$this->db->where("id_event", $id_event);
		return $this->db->get($this->table);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
	public function delete($id_panitia)
	{
		$this->db->where('id_panitia', $id_panitia);
		$this->db->delete($this->table);
	}
}