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
			'h_member.nim, h_member.nama, h_member.kelas, h_member.email, h_member.id_jabatan, h_member.kontak, h_member.deskripsi, h_member.image, h_divisi.id_divisi, h_divisi.nama_divisi, h_jabatan.id_jabatan, h_jabatan.nama_jabatan'
		);

		$this->db->where('aktif', 1); // cuma ambil yang aktif

		$this->db->from($this->table);
		$this->db->join('h_jabatan', 'h_jabatan.id_jabatan = ' . $this->table . '.id_jabatan');
		$this->db->join('h_divisi', 'h_divisi.id_divisi = h_jabatan.id_divisi');
		$this->db->order_by("nim", "ASC");
		return $this->db->get();
	}
	public function get_all()
	{
		$this->db->where('aktif', 1); // cuma ambil yang aktif
		
		$this->db->from($this->table);
		$this->db->order_by("nim", "ASC");
		return $this->db->get();
	}
	public function get_nonaktif()
	{
		$this->db->where('aktif', 0); // ambil yang nonaktif aja

		$this->db->order_by("nim", "DESC");
		return $this->db->get($this->table);
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
	public function check_member($email)
	{
		$this->db->where('email', $email);
		return $this->db->get($this->table)->row_array();
	}
	public function set_member_log($name)
	{
		$data = [
			'nama' => $name,
			'time' => time(),
		];
		$this->db->insert('h_member_login_log', $data);
	}
	public function nonaktifkan($nim)
	{
		$data = [
			'id_jabatan' => '',
			'aktif' => 0,
		];
		$this->db->where("nim", $nim);
		$this->db->update($this->table, $data);
	}
	public function search($wildcard)
	{
		//dipecah dulu
		$wildcard = explode(' ', $wildcard);

		$this->db->select( "nim, nama" );
		$this->db->where( "aktif", 1 );

		$this->db->limit( 100 );

		$this->db->order_by( "nama", "ASC" );
		foreach ($wildcard as $key => $val) {
		    $this->db->like( "nama", $val );
		}
		return $this->db->get($this->table);
	}
}
