<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $all_divisi = '';

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
	}

	public function index()
	{
		$data = '';
		// $data['carousel'] = $this->Model_carousel->get()->result_array();
		// $data['events'] = $this->Model_event->get_upcoming()->result_array();
		// $data['events_lama'] = $this->Model_event->get_lama()->result_array();

		$this->load->view('member/login', $data);
	}
}
