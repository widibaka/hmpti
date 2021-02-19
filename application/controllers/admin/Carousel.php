<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_divisi");
		$this->load->model("Model_carousel");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}
	public function index()
	{
		$data['title'] = "Website";
		$data['subtitle'] = "Carousel";
		
		$data['main_data'] = $this->Model_carousel->get()->result_array();

		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/carousel', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/carousel_js', $data);
	}
	public function edit()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);

		$filename_without_ext = explode(".", $post['image_filename'])[0];
		$upload = $this->do_upload($filename_without_ext);
		if ( !empty($upload) ) {
		 	$post['image'] = $upload;

		 	// delete previous image
		 	if ( file_exists( "assets/img/carousel/" . $post['image_filename'] ) ) {
		 		unlink( "assets/img/carousel/" . $post['image_filename'] );
		 	}

		} //<-- To update image file name

		// unset array element image_filename
		unset( $post['image_filename'] );

		$this->Model_carousel->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url() . "admin/carousel");
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
		redirect(base_url() . "admin/carousel");
	}
	public function delete($id_carousel)
	{
		$this->Model_member->add( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil dihapus.");
		redirect(base_url() . "admin/carousel");
	}

	public function do_upload($nim)
	{
        $config['upload_path']          = './assets/img/carousel';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 800;
        $config['max_width']            = 1600;
        $config['max_height']           = 800;
        $config['file_name']           = $nim;
        $config['overwrite']           = true;

        $this->load->library('upload', $config);
        
        if ( !$this->upload->do_upload('image') )
        {
            $error = $this->upload->display_errors(); 
            if ( $error != '<p>Anda belum memilih berkas untuk diunggah.</p>' ) { //<-- kalau errornya karena gak ada file, ya berarti ga ada error. User emang gak mau upload
            	$this->session->set_flashdata("msg", "error#Proses Gagal::".$error);
            	redirect(base_url() . "admin/carousel");
            }
        }
        else{
        	$nama_file = $this->upload->data('file_name') . "?" . time();
        	return $nama_file;
        }
	}

}