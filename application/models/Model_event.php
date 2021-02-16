<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_event extends CI_model {

	public $table = "h_events";
	public function get_upcoming()
	{
		$this->db->where( "publish", "1" );
		$this->db->where( "jadwal >", time() );
		return $this->db->get($this->table);
	}
	public function get_lama()
	{
		$this->db->where( "publish", "1" );
		$this->db->where( "jadwal <", time() );
		return $this->db->get($this->table);
	}
}
