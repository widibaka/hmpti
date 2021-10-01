<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_carousel");
		$this->load->model("Model_member");
		$this->load->model("Model_divisi");
		$this->load->model("Model_jabatan");
		$this->load->model("Model_proker");
		$this->load->model("Model_event");
		$this->load->model("Model_pendaftar");
		$this->load->model("Model_panitia");

		$this->x->harus_login($this->session);

		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['subtitle'] = "";

		// $data['carousel'] = $this->Model_carousel->get()->result_array();
		$data['events'] = $this->Model_event->get_10_event_terakhir()->result_array();
		$data_members = $this->Model_member->get_all()->result_array();

		// Membuat array baru
		$data['members'] = array();
		$menjadi_panitia = array();
		foreach ($data_members as $key => $val) {
			$data['members'][$key]['nama'] = $val['nama'];
			$menjadi_panitia[$key] = $this->Model_panitia->hitung_row_by_email($val['email']);
			$data['members'][$key]['menjadi_panitia'] = $menjadi_panitia[$key];
			$data['members'][$key]['details'] = $this->Model_panitia->get_panitia_by_email($val['email']);
		}
		array_multisort($menjadi_panitia, SORT_DESC, $data['members']);


		foreach ($data['events'] as $key => $val) {
			$data['events'][$key]['jumlah_pendaftar'] = $this->Model_pendaftar->jumlah_pendaftar_event($val['id_event']);
		}

		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/dashboard', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/dashboard_js', $data);

	}
}