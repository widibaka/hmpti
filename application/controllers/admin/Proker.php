<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Program Kerja
 */
class Proker extends CI_Controller
{
	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_proker");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}

	public function i($id_divisi='')
	{
		$data['title'] = 'Proker';
		$data['divisi'] = $this->Model_divisi->get_tunggal($id_divisi)->row_array();
		$data['subtitle'] = $data['divisi']['nama_divisi'];
		$data['main_data'] = $this->Model_proker->get_by_divisi($id_divisi)->result_array();
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/proker', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/proker_js', $data);
	}
	public function edit($id_divisi)
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);

		$this->Model_proker->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url().'admin/proker/i/'.$id_divisi);
	}
	public function add($id_divisi)
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);

		$this->Model_proker->add( $post, $id_divisi );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambah.");
		redirect(base_url().'admin/proker/i/'.$id_divisi);
	}
	public function delete($id_divisi, $id_proker)
	{
		$this->Model_proker->delete( $id_proker );
		$this->session->set_flashdata("msg", "success#Data berhasil dihapus.");
		redirect(base_url().'admin/proker/i/'.$id_divisi);
	}
}