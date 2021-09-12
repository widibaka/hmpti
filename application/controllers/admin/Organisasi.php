<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_detail_organisasi");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Website";
		$data['subtitle'] = "Organisasi";
		
		$data['main_data'] = $this->Model_detail_organisasi->get()->row_array();

		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/organisasi', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/organisasi_js', $data);
	}
	public function edit()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		

		$upload = $this->do_upload();
		if ( !empty($upload) ) {
		 	$post['image'] = $upload;
		} //<-- To update image file name

		

		$this->Model_detail_organisasi->edit( $post );
		$this->session->set_flashdata("msg", "success#Perubahan berhasil disimpan.");
		redirect(base_url() . "admin/organisasi");
	}

	public function do_upload()
	{
        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 700;
        $config['max_width']            = 1300;
        $config['max_height']           = 1300;
        $config['file_name']           = "logo";
        $config['overwrite']           = true;

        $this->load->library('upload', $config);
        
        if ( !$this->upload->do_upload('image') )
        {
            $error = $this->upload->display_errors(); 
            if ( $error != '<p>Anda belum memilih berkas untuk diunggah.</p>' ) { //<-- kalau errornya karena gak ada file, ya berarti ga ada error. User emang gak mau upload
            	$this->session->set_flashdata("msg", "error#Proses Gagal::".$error);
            	redirect(base_url() . "admin/organisasi");
            }
        }
        else{
        	$nama_file = $this->upload->data('file_name') . "?" . time();
        	return $nama_file;
        }
	}

}