<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sertifikat extends CI_model {

  public $table = "h_sertifikat";

  public function get_data_sertifikat($id_event)
	{
		$this->db->where("id_event", $id_event);
		return $this->db->get($this->table);
	}

  public function set_data_sertifikat($x, $y, $id_event, $tinggi_image, $lebar_image, $font_size, $font_color_nama, $font_color_id)
	{

		// variabel yang nilainya 0 akan diabaikan
		if (!empty($id_event)) {
			$data['id_event'] = $id_event;
		} else {
			echo "Error di set_data_sertifikat();";
			die();
		}
		if (!empty($x)) {
			$data['posisi_x'] = $x;
		} else {
			$data['posisi_x'] = 281;
		}
		if (!empty($y)) {
			$data['posisi_y'] = $y;
		} else {
			$data['posisi_y'] = 144;
		}
		if (!empty($tinggi_image)) {
			$data['tinggi_image'] = $tinggi_image;
		}
		if (!empty($lebar_image)) {
			$data['lebar_image'] = $lebar_image;
		}

		$data['font_size'] = $font_size;
		$data['font_color_nama'] = $font_color_nama;
		$data['font_color_id'] = $font_color_id;


		$this->db->where('id_event =', $id_event);
		$this->db->limit(1);
    $periksa = $this->db->get( $this->table )->row_array();

		if ( empty($periksa) ) { //kalo gak ada, berarti insert
			$this->db->insert( $this->table, $data);
		} else { // kalo ada, maka update
			$this->db->where('id_event =', $id_event);
			$this->db->update( $this->table, $data);
		}
		return true;
	}
}