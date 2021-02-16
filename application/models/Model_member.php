<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_model {

	public $table = "h_member";
	public function get($id_jabatan)
	{
		$this->db->where('id_jabatan', $id_jabatan);
		return $this->db->get($this->table);
	}
	public function get_all_and_join()
	{
		$this->db->select(
			'h_member.nim, h_member.nama, h_member.email, h_member.id_jabatan, h_member.kontak, h_member.deskripsi, h_member.image, h_divisi.id_divisi, h_divisi.nama_divisi, h_jabatan.id_jabatan, h_jabatan.nama_jabatan'
		);
		$this->db->from($this->table);
		$this->db->join('h_jabatan', 'h_jabatan.id_jabatan = ' . $this->table . '.id_jabatan');
		$this->db->join('h_divisi', 'h_divisi.id_divisi = h_jabatan.id_divisi');
		$this->db->order_by("nim", "ASC");
		return $this->db->get();
	}
	public function get_by_nim($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where("nim", $post['nim']);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
}
