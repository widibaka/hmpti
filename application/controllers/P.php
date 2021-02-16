<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

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

		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}

	public function index()
	{
		$data['carousel'] = $this->Model_carousel->get()->result_array();
		$data['events'] = $this->Model_event->get_upcoming()->result_array();
		$data['events_lama'] = $this->Model_event->get_lama()->result_array();
		// echo "<pre>"; var_dump( $data['events'] ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/home_page', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function divisi($id_divisi)
	{
		$data = $this->Model_divisi->get_tunggal($id_divisi)->row_array();
		$data['proker_jamak'] = $this->Model_proker->get_by_divisi($id_divisi)->result_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/divisi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function profil($nim)
	{
		$data = $this->Model_member->get_by_nim($nim)->row_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/profil', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function struktur_organisasi()
	{
		$data['divisi'] = $this->Model_divisi->get()->result_array();
		// echo "<pre>"; var_dump( $data ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/struktur_organisasi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function visi_misi()
	{
		$data = $this->Model_detail_organisasi->get()->row_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/visi_misi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
}