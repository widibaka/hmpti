<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_divisi");
		$this->load->model("Model_jabatan");
		$this->load->model("Model_member");
		$this->load->model("Model_event");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Event";
		$data['subtitle'] = "Event Manager";
		
		$data['main_data'] = $this->Model_event->get_all()->result_array();

		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/event', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/event_js', $data);
	}
	public function editor($id_event='')
	{
		$data['title'] = "Event";
		$data['main_data'] = $this->Model_event->get_single($id_event)->row_array();
		$data['subtitle'] = "Event Editor - ".$data['main_data']['judul'];
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/event_editor', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/event_editor_js', $data);
	}
	public function edit()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			if ( $name != 'deskripsi' ) { //<-- filter all except deskripsi
				$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
			}
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		$post['deskripsi'] = $_POST['deskripsi']; //<-- lompati filter XSS, soalnya ini pakai summernote.js

		// dealing with tanggal format, ugh! what a pain in the neck
		$jwl = explode('/', $post['jadwal']);
		$post['jadwal'] = $jwl[1] . '/' . $jwl[0] . '/' . $jwl[2]; //<-- tukar posisi tanggal dan bulan
		$post['jadwal'] = str_replace('.', ':', $post['jadwal']) . ':00';
		$post['jadwal'] = strtotime($post['jadwal']);

		// Jadi gini, ketika thumbnail ingin diupdate upload thumbnail doang, ketika poster mau diupdate upload poster doang. Ketika dua-duanya, ya dua-duanya diupload
		$to_upload = [];
		if ( !empty($post['update_thumbnail']) ) {
			array_push($to_upload, 
				[
				'element_name' => 'thumbnail',
				'filename' => 'thumb-'.$post['id_event'],
				'id_event' => $post['id_event']
				]
			);
		}
		if ( !empty($post['update_poster']) ) {
			array_push($to_upload, 
				[
				'element_name' => 'poster',
				'filename' => 'poster-'.$post['id_event'],
				'id_event' => $post['id_event']
				]
			);
		}

		$upload = $this->upload_multiple( $to_upload );
		foreach ($upload as $key => $val) {
			if ( !empty($val) ) {
				$post[ $key ] = $val; //<-- To update image file name
			}
		}

		// bersihkan elemen array yang gak dibutuhin
		unset($post['update_thumbnail']);
		unset($post['update_poster']);

		$post['author'] = $this->session->userdata['name'];

		$post['last_update'] = time();


		$this->Model_event->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url() . "admin/event/");
	}
	// public function add()
	// {
	// 	$post = $this->input->post(NULL, true);
	// 	foreach ($post as $name => $val) { //<-- langsung sapu semua
	// 		$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
	// 	}
	// 	$this->form_validation->run();
	// 	$post = $this->input->post(NULL, true);
		

	// 	$upload = $this->do_upload($post['nim']);
	// 	if ( !empty($upload) ) {
	// 	 	$post['image'] = $upload;
	// 	} //<-- To update image file name

	// 	$this->Model_member->add( $post );
	// 	$this->session->set_flashdata("msg", "success#Data berhasil ditambahkan.");
	// 	redirect(base_url() . "admin/anggota");
	// }

	// public function nonaktifkan($nim='')
	// {
	// 	$this->Model_member->nonaktifkan($nim);
	// 	redirect(base_url() . "admin/anggota");
	// }

	public function upload_multiple($data)
	{
		$returns = array();
		foreach ($data as $key => $val) {
			$returns[ $val['element_name'] ] = $this->do_upload($val['element_name'], $val['filename'], $val['id_event']);
		}
		return $returns;
	}

	public function do_upload($element_name, $new_name, $id_event)
	{
        $config['upload_path']          = './assets/img/events/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 700;
        $config['max_width']            = 1000;
        $config['max_height']           = 1000;
        // $config['file_name']           = $new_name; 
        $config['overwrite']           = true;

        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload($element_name) )
        {
            $error = $this->upload->display_errors(); 
            if ( strpos($error, 'Anda belum memilih berkas untuk diunggah.') == false ) { //<-- kalau errornya karena gak ada file, ya berarti ga ada error. User emang gak mau upload
            // echo "<pre>"; var_dump( $error ); die();
            	$this->session->set_flashdata("msg", "error#Proses Gagal::".$error);
            	redirect(base_url() . "admin/event/editor/" . $id_event);
            }
        }
        else{
        	//renaming
        	rename(
        		"assets/img/events/" . $this->upload->data('file_name'), 
        		"assets/img/events/" . $new_name . '.jpg' // Bodo amat, pokoknya ganti jadi jpg semua!
        	);
        }
        return $new_name . '.jpg' . "?" . time();
	}

}