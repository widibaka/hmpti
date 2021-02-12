<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

	public $all_divisi = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_carousel");
		$this->load->model("Model_member");
		$this->load->model("Model_divisi");
		$this->load->model("Model_jabatan");

		$this->all_divisi = $this->Model_divisi->get()->result_array();
	}

	public function index()
	{
		$data['carousel'] = $this->Model_carousel->get()->result_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/home_page', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function divisi()
	{
		$this->load->view('end_user/templates/header');
		$this->load->view('end_user/divisi');
		$this->load->view('end_user/templates/footer');
	}
	public function profil()
	{
		$this->load->view('end_user/templates/header');
		$this->load->view('end_user/profil');
		$this->load->view('end_user/templates/footer');
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
