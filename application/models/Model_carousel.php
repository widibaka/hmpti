<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_carousel extends CI_model {

	public $table = "h_carousel";
	public function get()
	{
		return $this->db->get($this->table);
	}
	public function get_single($id_carousel)
	{
		$this->db->where('id_carousel', $id_carousel);
        $this->db->limit(1);
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where("id_carousel", $post['id_carousel']);
        $this->db->limit(1);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
	public function delete($id_carousel)
	{
		$this->db->where("id_carousel", $id_carousel);
        $this->db->limit(1);
		$this->db->delete($this->table);
	}
}
