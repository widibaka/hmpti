<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public $title = '';

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

		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}

	public function index()
	{
		$this->title = 'Home Page';
		$data['carousel'] = $this->Model_carousel->get()->result_array();
		$data['events'] = $this->Model_event->get_upcoming()->result_array();
		$data['events_lama'] = $this->Model_event->get_lama()->result_array();
		// echo "<pre>"; var_dump( $data['events'] ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/home_page', $data);
		$this->load->view('end_user/templates/footer', $data);
		$this->load->view('end_user/home_page_js', $data);
	}
	public function divisi($id_divisi)
	{
		$data = $this->Model_divisi->get_tunggal($id_divisi)->row_array();
		$this->title = $data['nama_divisi'];
		$data['proker_jamak'] = $this->Model_proker->get_by_divisi($id_divisi)->result_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/divisi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function profil($nim)
	{
		$data = $this->Model_member->get_by_nim($nim)->row_array();
		$this->title = 'Profil ' . $data['nama'];
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/profil', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function struktur_organisasi()
	{
		$this->title = 'Struktur Organisasi';
		$data['divisi'] = $this->Model_divisi->get()->result_array();
		// echo "<pre>"; var_dump( $data ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/struktur_organisasi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function visi_misi()
	{
		$this->title = 'Visi dan Misi';
		$data = $this->Model_detail_organisasi->get()->row_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/visi_misi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}



	/*
	* AJAX's thing or whatever goes down there
	*/

	public function ajax_detail_event($id_event)
	{
		$data = $this->Model_event->get_single($id_event)->row_array();
		$data['status'] = "Dibuka";
		$data['pendaftar'] = "100";
		$this->load->view( "end_user/home_page_detail_event", $data );
	}
}
