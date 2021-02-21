<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_jabatan");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Keanggotaan";
		$data['subtitle'] = "Jabatan";
		
		$data['main_data'] = $this->Model_jabatan->get_all()->result_array();
		$data['divisi'] = $this->Model_divisi->get()->result_array();
		
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/jabatan', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/jabatan_js', $data);

	}
	public function edit()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);

		$this->Model_jabatan->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url() . "admin/jabatan");
	}
	public function add()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		
		$this->Model_jabatan->add( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambahkan.");
		redirect(base_url() . "admin/jabatan");
	}
	public function delete($id_jabatan)
	{
		$delete = $this->Model_jabatan->delete( $id_jabatan );
		if ( $delete == true ) {
			$this->session->set_flashdata("msg", "success#Data berhasil dihapus.");
		}
		else{
			$this->session->set_flashdata("msg", "error#Data gagal dihapus, mungkin data masih dipakai.");
		}
		redirect(base_url() . "admin/jabatan");
	}

}