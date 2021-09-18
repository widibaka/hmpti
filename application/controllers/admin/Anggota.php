<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_divisi");
		$this->load->model("Model_jabatan");
		$this->load->model("Model_member");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Keanggotaan";
		$data['subtitle'] = "Anggota";
		
		$data['main_data'] = $this->Model_member->get_all_and_join()->result_array();
		$data['jabatan'] = $this->Model_jabatan->get_all()->result_array();

		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/anggota', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/anggota_js', $data);
	}
	public function edit()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);


		$upload = $this->do_upload($post['nim']);
		if ( !empty($upload) ) {
		 	$post['image'] = $upload;
		} //<-- To update image file name

		$this->Model_member->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url() . "admin/anggota");
	}
	public function add()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		

		$upload = $this->do_upload($post['nim']);
		if ( !empty($upload) ) {
		 	$post['image'] = $upload;
		} //<-- To update image file name

		$this->Model_member->add( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambahkan.");
		redirect(base_url() . "admin/anggota");
	}

	public function nonaktifkan($nim='')
	{
		$this->Model_member->nonaktifkan($nim);
		redirect(base_url() . "admin/anggota");
	}

	public function do_upload($nim)
	{
        $config['upload_path']          = './assets/img/members/tmp';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 6000;
        $config['max_width']            = 4300;
        $config['max_height']           = 4300;
        $config['file_name']           = $nim;
        $config['overwrite']           = true;

        $this->load->library('upload', $config);
        $upl = $this->upload->do_upload('image');

        if ( !$upl )
        {
            $error = $this->upload->display_errors(); 
            if ( $error != '<p>Anda belum memilih berkas untuk diunggah.</p>' ) { //<-- kalau errornya karena gak ada file, ya berarti ga ada error. User emang gak mau upload
            	$this->session->set_flashdata("msg", "error#Proses Gagal::".$error);
            	redirect(base_url() . "admin/anggota");
            }
        }
        else{
        	$nama_file = $this->upload->data('file_name') . "?" . time();
					// mengecilkan ukuran foto
					$this->load->model('ResizeImage');
					$this->ResizeImage->dir( $this->upload->data('full_path') );


					// buat gambar poster
					$this->ResizeImage->resizeTo(500, 500, 'maxwidth');
					$this->ResizeImage->saveImage('assets/img/members/' . $this->upload->data('file_name'));
					

					$this->load->helper('file');
					unlink($this->upload->data('full_path')); // delete temporary file

        	return $nama_file;
        }
	}

}