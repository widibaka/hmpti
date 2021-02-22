<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_event extends CI_model {

	public $table = "h_events";
	public function get_all()
	{
		$this->db->order_by( "jadwal", "DESC" );
		return $this->db->get($this->table);
	}
	public function get_upcoming()
	{
		$this->db->where( "publish", "1" );
		$this->db->order_by( "jadwal", "DESC" );
		$this->db->where( "jadwal >", time() );
		return $this->db->get($this->table);
	}
	public function get_lama()
	{
		$this->db->where( "publish", "1" );
		$this->db->limit(3);
		$this->db->order_by( "jadwal", "DESC" );
		$this->db->where( "jadwal <", time() );
		return $this->db->get($this->table);
	}
	public function get_single($id_event)
	{
		$this->db->where( "id_event", $id_event );
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where('id_event', $post['id_event']);
		$this->db->update($this->table, $post);
	}
	// public function add($post, $id_divisi)
	// {
	// 	$post['id_divisi'] = $id_divisi;
	// 	$this->db->insert($this->table, $post);
	// }
	// public function delete($id_proker)
	// {
	// 	$this->db->where('id_proker', $id_proker);
	// 	$this->db->delete($this->table);
	// }
}
