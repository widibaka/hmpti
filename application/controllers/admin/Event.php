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
		$this->load->model("Model_panitia");
		$this->load->model("Model_pendaftar");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Event";
		$data['subtitle'] = "Event Manager";
		
		// $data['main_data'] = $this->Model_event->get_all()->result_array();

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
		if ( !empty($id_event) ) {
			$data['main_data'] = $this->Model_event->get_single($id_event)->row_array();
			$data['url'] = base_url('admin/event/edit');
			$data['subtitle'] = "Event Editor - ".$data['main_data']['judul'];
		}else{
			$data['url'] = base_url('admin/event/add');
			$data['subtitle'] = "Add Event";
		}

		if ( !empty($data['main_data']['sertifikat']) ) {
			$this->load->model('Model_sertifikat');
			$data['sertifikat'] = $this->Model_sertifikat->get_data_sertifikat( $id_event )->row_array();
      // posisi x dan y dikali 4, enam adalah hasil proyeksi yang saya hitung tadi pake kalkulator
      $data['sertifikat']['posisi_x'] *= 4;
      $data['sertifikat']['posisi_y'] *= 4;
    }
    $data['id_event'] = $id_event;

		$data['members'] = $this->Model_member->get_all()->result_array();
		$data['panitia'] = $this->Model_panitia->get_by_id_event($id_event)->result_array();
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
			if ( $name != 'deskripsi' AND $name != 'pesan_utk_pendaftar' ) { //<-- filter all except deskripsi & pesan_utk_pendaftar
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
		// if ( !empty($post['update_thumbnail']) ) {
		// 	array_push($to_upload, 
		// 		[
		// 		'element_name' => 'thumbnail',
		// 		'filename' => 'thumb-'.$post['id_event'],
		// 		'id_event' => $post['id_event']
		// 		]
		// 	);
		// }
		if ( !empty($post['update_poster']) ) {
			array_push($to_upload, 
				[
				'element_name' => 'poster',
				'filename' => 'img-'.$post['id_event'],
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
		redirect(base_url() . "admin/event/editor/" . $post['id_event']);
	}
	public function add()
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
		// if ( !empty($post['update_thumbnail']) ) {
		// 	array_push($to_upload, 
		// 		[
		// 		'element_name' => 'thumbnail',
		// 		'filename' => 'thumb-'.$post['id_event'],
		// 		'id_event' => $post['id_event']
		// 		]
		// 	);
		// }
		if ( !empty($post['update_poster']) ) {
			array_push($to_upload, 
				[
				'element_name' => 'poster',
				'filename' => 'img-'.$post['id_event'],
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


		$this->Model_event->add( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambah. Silakan lengkapi data lanjutan, atau abaikan saja.");
		redirect(base_url() . "admin/event/editor/" . $post['id_event'] . '#section_sertifikat');
	}

	public function add_panitia()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		$this->Model_panitia->add( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambahkan.");
		redirect(base_url() . "admin/event/editor/" . $post['id_event'] . "#panitia_event");
	}

	public function del_panitia($id_panitia, $id_event)
	{
		$this->Model_panitia->delete( $id_panitia );
		$this->session->set_flashdata("msg", "success#Data berhasil dihapus.");
		redirect(base_url() . "admin/event/editor/" . $id_event);
	}

	public function upload_multiple($data)
	{
		$returns = array();
		foreach ($data as $key => $val) {
			$upl = $this->do_upload($val['element_name'], $val['filename'], $val['id_event']);
			// if ( $key > 0 ) {
			// 	echo "<pre>"; var_dump( $upl ); die();
			// }
			// mengecilkan ukuran foto
			$this->load->model('ResizeImage');
			$this->ResizeImage->dir( $upl['full_path'] );



			// buat gambar poster
			$this->ResizeImage->resizeTo(800, 800, 'maxwidth');
			$this->ResizeImage->saveImage('assets/img/events/' . 'poster-' . $upl['file_name']);
			// buat gambar thumbnail
			$this->ResizeImage->resizeTo(400, 300, 'maxwidth');
			$this->ResizeImage->saveImage('assets/img/events/' . 'thumbnail-' .  $upl['file_name']);
			



			$this->load->helper('file');
			unlink($upl['full_path']); // delete temporary file

			$returns[ 'poster' ] = 'poster-' . $upl['file_name'] . "?" . time();
			$returns[ 'thumbnail' ] = 'thumbnail-' .  $upl['file_name'] . "?" . time();
		}
		return $returns;
	}

	public function do_upload($element_name, $new_name, $id_event)
	{
        $config['upload_path']          = './assets/img/events/tmp/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2100;
        $config['max_width']            = 3300;
        $config['max_height']           = 3300;
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
        		"assets/img/events/tmp/" . $this->upload->data('file_name'), 
        		"assets/img/events/tmp/" . $new_name . $this->upload->data('file_ext')
        	);

        	$returns = [
        		'full_path' => 'assets/img/events/tmp/'.$new_name . $this->upload->data('file_ext'),
        		'file_name' =>  $new_name . $this->upload->data('file_ext'),
        	];
        	return $returns;
        }
	}

	public function upload_sertifikat($id_event = null)
	{
		if (isset($_FILES['image_sertifikat'])) { 
      // upload gambar
      $gambar = $this->do_upload('image_sertifikat', 'sertifikat-'.$id_event, $id_event); // (input_name, path, filename_untuk_rename ) ;; outputnya status dan data

      $refresher = '?' . time(); // $refresher ini tugasnya untuk membuat link baru, jadi browser enggak buka gambar hasil cached


      if ( !empty($gambar['full_path']) ) { // kalau berhasil upload, simpan data ke db
        
        /*
        *
        * START sertifikat akan di-resize exact 2248 x 1590
        *
        */
        
        // mengecilkan ukuran foto
        $path_berkas = $gambar['full_path']; // menentukan tempat berkas sertifikat

        $this->load->model('ResizeImage');
        $this->ResizeImage->dir( $path_berkas );
        $this->ResizeImage->resizeTo(2248, 1590, 'exact');
        $this->ResizeImage->saveImage('assets/img/events/' . $gambar['file_name']);

        // update data tinggi dan lebar
        $gambar['image_width'] = 2248;
        $gambar['image_height'] = 1590;

        /*
        *
        * END resize exact 2248 x 1590
        *
        */

				// hapus temporary file
				unlink($gambar['full_path']);

				// update ke tabel h_event
				$data = [
					'id_event' => $id_event,
					'sertifikat' => $gambar['file_name'] . $refresher
				];
				$this->Model_event->edit($data);
        
				// Update tabel sertifikat
				$this->load->model('Model_sertifikat');
        $masukin_ke_db = $this->Model_sertifikat->set_data_sertifikat(0, 0, $id_event, $gambar['image_height'], $gambar['image_width'], 30, 'rgb(0, 0, 0)', 'rgb(0, 0, 0)');
        if ($masukin_ke_db != false) {
          $this->session->set_flashdata('msg', 'success#Upload sertifikat berhasil. Silakan tentukan koordinat untuk meletakkan nama peserta.');
          redirect( base_url() . 'admin/event/editor/' . $id_event . '#section_sertifikat' ); // kembali ke editor
        } else {
          $this->session->set_flashdata('msg', 'success#Upload sertifikat gagal. Mohon coba lagi');
          redirect( base_url() . 'admin/event/editor/' . $id_event . '#section_sertifikat' ); // kembali ke editor
        }
      } else {
        $this->session->set_flashdata('msg', 'danger#Upload gambar gagal. Silakan coba lagi. ' . $gambar['error']); // tampilkan errornya juga
        redirect( base_url() . 'admin/event/editor/' . $id_event . '#section_sertifikat' ); // kembali ke editor
      }
    }
	}

	public function sertifikat_set_koordinat($id_event)
  {
    if (!empty($this->input->post('posisi_x'))) { // saat submit
      $x = $this->input->post('posisi_x') /4 ; // dibagi empat. ini berdasarkan hasil proyeksi
      $y = $this->input->post('posisi_y') /4 ;

      $font_size = $this->input->post('font_size');
      $font_color_nama = $this->input->post('font_color_nama');
      $font_color_id = $this->input->post('font_color_id');

			$this->load->model('Model_sertifikat');
      $this->Model_sertifikat->set_data_sertifikat($x, $y, $id_event, 0, 0, $font_size, $font_color_nama, $font_color_id); // ubah posisi x dan y
      $this->session->set_flashdata('msg','success#Perubahan berhasil disimpan.');
      redirect( base_url( 'admin/event/editor/' . $id_event . '#section_sertifikat' ) ); // refresh halaman
    }

  }

	// DATATABLES
		public function get_data(  )
		{
		    $list = $this->Model_event->get_datatables(  );
		    // var_dump( $list ); die();
		    $data = array();
		    $no = $_POST['start'];
		    // var_dump($list); die;
		    foreach ($list as $field) {
		      
		        $row = array();
		        $t = 	  '<span id="thumbnail-'.$field->id_event.'">
	                          <span id="image-'.$field->id_event.'">
	                            <img width="140" src="';
	                                $filedir = 'assets/img/events/' . explode("?", $field->thumbnail)[0];
	                                if( file_exists( $filedir ) == true ){
	                                  $t .= base_url() . 'assets/img/events/' . $field->thumbnail;
	                                }
	                                else{
	                                  $t .= base_url() . 'assets/img/no_image.jpg';
	                                }
	                            $t .= '">
	                          </span> 
	                      </span>';
	            $row[] = $t;
		        $row[] = $field->judul;
		        $row[] = date( "d M Y, H:m", $field->jadwal );
		        // $row[] = '<a href="'.base_url() . 'assets/img/events/'.$field->poster.'">'.$field->poster.'</a>';
		        // $row[] = substr( strip_tags($field->deskripsi) , 0, 100) . '...';
		        		if ($field->publish == 0) {
		        			$b = '<span class="btn bg-danger disabled">OFF</span>';
		        		}else{
		        			$b = '<span class="btn bg-success disabled">ON</span>';
		        		}
		        $row[] = $b;
		        $row[] = $field->author;
		        $row[] = date( "d M Y, H:m", $field->last_update );
		        $row[] = '<a target="_blank" href="'.base_url() . 'p/review/' . $field->id_event.'">'.base_url() . 'p/review/' . $field->id_event.'<a>';
		        $row[] = $field->limit_pendaftar;
		        $row[] = '<a target="_blank" href="'.base_url() . '?event=' . $field->id_event.'">'.base_url() . '?event=' . $field->id_event.'<a>';
		        		$ctrl = '<div class="btn-group">
		  		                      <a href="'.base_url().'admin/event/editor/'.$field->id_event.'" type="button" title="Sunting" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</a>
		  		                      <a href="'.base_url().'admin/pendaftar/index/'.$field->id_event.'" type="button" class="btn btn-warning"><i class="fas fa-user-alt"></i> Pendaftar ('. $this->Model_pendaftar->pendaftar_event( $field->id_event )->num_rows() .')</a>
		  		                </div>';
		        $row[] = $ctrl;

		        $data[] = $row;
		    }
		
		    $output = array(
		        "draw" => $_POST['draw'],
		        "recordsTotal" => $this->Model_event->count_all(),
		        "recordsFiltered" => $this->Model_event->count_filtered(),
		        "data" => $data,
		    );
		    //output dalam format JSON
		    echo json_encode($output);
		}
	// DATATABLES

}