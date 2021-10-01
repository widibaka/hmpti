<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_panitia extends CI_model {

	public $table = "h_panitia";
	public function get_by_id_event($id_event)
	{
		$this->db->where("id_event", $id_event);
		return $this->db->get($this->table);
	}
	public function hitung_row_by_email($email)
	{
		$this->db->where("email", $email);
		return $this->db->get($this->table)->num_rows();
	}
	public function get_panitia_by_email($email)
	{
		$this->db->from($this->table);
		$this->db->join('h_events', 'h_events.id_event = '.$this->table.'.id_event');
		$this->db->select('email, peran, h_events.id_event, judul');
		$this->db->where("email", $email);
		return $this->db->get()->result_array();
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