<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_detail_organisasi");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}
	public function index()
	{
		$data['title'] = "Keanggotaan";
		$data['subtitle'] = "Divisi";
		
		$data['main_data'] = $this->Model_divisi->get()->result_array();
		
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/divisi', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/divisi_js', $data);

	}
	public function edit()
	{
		$this->Model_divisi->edit( $this->input->post(NULL, true) );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url() . "admin/divisi");
	}
	public function add()
	{
		$this->Model_divisi->add( $this->input->post(NULL, true) );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambahkan.");
		redirect(base_url() . "admin/divisi");
	}

}