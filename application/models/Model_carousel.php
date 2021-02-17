<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_carousel extends CI_model {

	public $table = "h_carousel";
	public function get()
	{
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where("id_carousel", $post['id_carousel']);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
}
