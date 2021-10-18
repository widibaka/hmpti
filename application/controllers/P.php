<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public $title = '';

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
		$this->load->model("Model_panitia");
		$this->load->model("Model_pendaftar");
		$this->load->model("Model_sertifikat");

		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}

	public function index()
	{
		$this->title = 'Home Page';
		$data['carousel'] = $this->Model_carousel->get()->result_array();
		$data['events'] = $this->Model_event->get_upcoming()->result_array();
		$data['events_lama'] = $this->Model_event->get_lama()->result_array();
		// echo "<pre>"; var_dump( $data['events'] ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/home_page', $data);
		$this->load->view('end_user/home_page_upcoming', $data);
		$this->load->view('end_user/home_page_history', $data);
		$this->load->view('end_user/home_page_divisi', $data);
		$this->load->view('end_user/templates/footer', $data);
		$this->load->view('end_user/home_page_js', $data);
	}

	public function search()
	{
		$q = $this->input->get('q', true);
		$this->title = 'Search';
		$data['events'] = $this->Model_event->search($q)->result_array();
		$data['members'] = $this->Model_member->search($q)->result_array();
		// echo "<pre>"; var_dump( $data['events'] ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/search', $data);
		$this->load->view('end_user/templates/footer', $data);
		$this->load->view('end_user/search_js', $data);
	}
	public function divisi($id_divisi)
	{
		$data = $this->Model_divisi->get_tunggal($id_divisi)->row_array();
		$this->title = $data['nama_divisi'];
		$data['proker_jamak'] = $this->Model_proker->get_by_divisi($id_divisi)->result_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/divisi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function profil($nim)
	{
		$data = $this->Model_member->get_by_nim($nim)->row_array();
		$this->title = 'Profil ' . $data['nama'];
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/profil', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function struktur_organisasi()
	{
		$this->title = 'Struktur Organisasi';
		$data['divisi'] = $this->Model_divisi->get()->result_array();
		// echo "<pre>"; var_dump( $data ); die();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/struktur_organisasi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function visi_misi()
	{
		$this->title = 'Visi dan Misi';
		$data = $this->Model_detail_organisasi->get()->row_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/visi_misi', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function anggota_nonaktif()
	{
		$this->title = 'Anggota Nonaktif';
		$data['anggota_nonaktif'] = $this->Model_member->get_nonaktif()->result_array();
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/nonaktif', $data);
		$this->load->view('end_user/templates/footer', $data);
	}
	public function verifikasi_sertifikat()
	{
		$data = [];
		$data['pendaftar'] = false;
		if ( !empty( $this->input->post() ) ) {
			$id_pendaftar = $this->input->post('id_pendaftar');
			$check_pendaftar = $this->Model_pendaftar->verifikasi_sertifikat( $id_pendaftar )->row_array();
			$data['pendaftar'] = $check_pendaftar;
		}
		$this->title = 'Verifikasi Sertifikat';
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/verifikasi_sertifikat', $data);
		$this->load->view('end_user/templates/footer', $data);
		$this->load->view('end_user/verifikasi_sertifikat_JS', $data);
	}
	public function daftar_event($id_event='')
	{
		if ( empty($id_event) ) {
			die('Ha?');
		}

		$e = $this->Model_event->get_single($id_event)->row_array();
		// cek apakah event belum kedaluarsa
		if ( $e['jadwal'] - time() < 0 ) {
			$this->session->set_flashdata("msg", "error#Event ini sudah kedaluarsa.");
			redirect( base_url() );
		}
		

		if ( empty($this->session->userdata('name')) ) {
			// suruh login, lalu ketika login langsung balik ke sini
			$this->session->set_flashdata("msg", "warning#Silakan login dulu sebelum mendaftar event.");
			redirect( base_url() . 'login?balik=' . base64_encode($this->uri->uri_string()) );
		}

		// kalau user setuju, maka daftarkan
		if ( !empty($_POST['konfirmasi']) && $_POST['konfirmasi'] == 'yes' ) {

			// cek apakah sudah penuh kuotanya
			if ( $e['limit_pendaftar'] != 0  ) { // <-- hanya ketika ada kuota peserta saja
				$jum_pendaftar = $this->Model_pendaftar->pendaftar_event($id_event)->num_rows();
				if ( $e['limit_pendaftar'] - $jum_pendaftar <= 0 ) {
					$this->session->set_flashdata("msg", "error#Maaf, kuota pendaftar sudah penuh.");
					redirect( base_url() );
				}
			}

			// menentukan data tambahan nya mana saja. semua data post, kecuali nama
			$data_tambahan = $this->input->post();
			unset($data_tambahan['nama']);
			unset($data_tambahan['konfirmasi']);
			unset($data_tambahan['pembayaran']);
			unset($data_tambahan['indikator_pembayaran']);
			$data_tambahan = json_encode($data_tambahan); // dibikin jadi string

			
			$to_upload = [];
			if ( !empty($_POST['indikator_pembayaran']) ) { // <-- ketika ada upload pembayaran
				array_push($to_upload, 
					[
					'element_name' => 'pembayaran',
					'filename' => 'pembayaran-'. crc32($this->input->post('nama', true)) .'-'.$id_event,
					]
				);
			}


			$upload = $this->upload_multiple( $to_upload );
			foreach ($upload as $key => $val) {
				if ( !empty($val) ) {
					$_POST[ $key ] = $val; //<-- To update image file name
				}
			}
			unset($_POST['indikator_pembayaran']);


			// lalu semua data yang diperlukan dimasukin ke database
			$jumlah_total_plus1 = (int)$this->Model_pendaftar->jumlah_seluruh_pendaftar()+1;
			$post_to_db = [
				'id_pendaftar' => 'HMPTI' . $id_event . rand(10, 100) . $jumlah_total_plus1, 
				'email' => $this->session->userdata('email'), 
				'nama' =>	$this->input->post('nama', true), 
				'id_event' =>	$id_event,
				'data_tambahan' =>	$data_tambahan,
				'pembayaran' => $upload['pembayaran'],
				'waktu' => date('Y-m-d H:i:s'),
			];
			$stat_daftar = $this->Model_pendaftar->add( $post_to_db );


			if ( $stat_daftar == 'sudah daftar' ) {
				$isi_msg = [
					"warning#Daftar berkali-kali juga boleh. Tapi cuma dihitung satu.",
					"warning#Daftar berkali-kali juga boleh. Tapi cuma dihitung satu.",
					"question#Sudah terdaftar. Anda mau daftar berapa kali sis?",
					"warning#Cukup satu aja, kamu. Iyaa kamuu...",
					"warning#Tarek sis! Semongko...",
					"warning#Tarek sis! Semongko...",
				];
				$this->session->set_flashdata("msg", $isi_msg[rand(-1,4)]);
			}else{ //<-- kalau sudah daftar, dan baru sekali
				$this->session->set_flashdata("msg", "success#Selamat, ". $this->session->userdata('email') ." telah terdaftar di event ini.");
			}
			// clear request
			$_POST = null;
			redirect( $this->uri->uri_string() );
		}

		$this->title = 'Mendaftar Event';
		$data['id_event'] = $id_event;
		$data['event'] = $e;
		$this->load->view('end_user/templates/header', $data);
		$this->load->view('end_user/daftar_event', $data);
		$this->load->view('end_user/templates/footer', $data);
		$this->load->view('end_user/daftar_event_js', $data);
	}

	public function review($id_event='')
	{

		if ( empty($this->session->userdata('name')) ) {
			// suruh login, lalu ketika login langsung balik ke sini
			$this->session->set_flashdata("msg", "warning#Silakan login dulu sebelum memberi ulasan.");
			redirect( base_url() . 'login?balik=' . base64_encode($this->uri->uri_string()) );
		}


		$pendaftar = $this->Model_pendaftar->check_exists( $this->session->userdata('email'), $id_event );

		if ( $pendaftar->num_rows() == 0 ) {
			$this->session->set_flashdata("msg", "error#Anda tidak terdaftar dalam event ini.");
			redirect( base_url() );
		}

		$post = $this->input->post(NULL, true);
		if ( !empty(count($post)) ) {
			foreach ($post as $name => $val) { //<-- langsung sapu semua
				$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
			}
			$this->form_validation->run();
			$post = $this->input->post(NULL, true);

			$to_upload = [];
			if ( !empty($post['indikator_kehadiran']) ) { // <-- ketika ada upload kehadiran
				array_push($to_upload, 
					[
					'element_name' => 'kehadiran',
					'filename' => 'kehadiran-'.$pendaftar->row_array()['id_pendaftar'].'-'.$id_event,
					]
				);
			}

			$upload = $this->upload_multiple( $to_upload );
			foreach ($upload as $key => $val) {
				if ( !empty($val) ) {
					$post[ $key ] = $val; //<-- To update image file name
				}
			}

			//clean up
			unset($post['indikator_kehadiran']);

			$this->Model_pendaftar->update_review($post, $pendaftar->row_array()['id_pendaftar']);

			$this->session->set_flashdata("msg", "success#Ulasan telah tersimpan. Anda dapat menutup tab ini.");
			redirect( base_url() );	

		}
			

		$this->title = 'Ulas Event';

		$email = $this->session->userdata('email');
		$data['get_pendaftar'] = $this->Model_pendaftar->check_exists( $email, $id_event );

		$data['id_event'] = $id_event;
		$data['event'] = $this->Model_event->get_single($id_event)->row_array();

		if ( $data['event']['jadwal'] - time() > 0 ) { // Kalau event nya belum terlewat/selesai
			// mental ke home page
			$this->session->set_flashdata("msg", "error#Maaf, event belum selesai, belum saatnya untuk mengulas.");
			redirect( base_url() );	
		}else{
			$this->load->view('end_user/templates/header', $data);
			$this->load->view('end_user/review', $data);
			$this->load->view('end_user/templates/footer', $data);
			$this->load->view('end_user/review_js', $data);
		}

		
	}
	public function upload_multiple($data)
	{
		$returns = array();
		foreach ($data as $key => $val) {
			$upl = $this->do_upload($val['element_name'], $val['filename']);
			// if ( $key > 0 ) {
			// 	echo "<pre>"; var_dump( $upl ); die();
			// }
			// mengecilkan ukuran foto
			$this->load->model('ResizeImage');
			$this->ResizeImage->dir( $upl['full_path'] );
			$this->ResizeImage->resizeTo(480, 480, 'maxHeight');
			$this->ResizeImage->saveImage('assets/img/pendaftar/' . $upl['file_name']);

			$this->load->helper('file');
			unlink($upl['full_path']); // delete temporary file

			$returns[ $val['element_name'] ] = $upl['file_name'] . "?" . time();
		}
		return $returns;
	}

	public function do_upload($element_name, $new_name)
	{
        $config['upload_path']          = './assets/img/pendaftar/tmp/';
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
            	$this->session->set_flashdata("msg", "error#Proses Gagal:: ".$error);
            	redirect(base_url() . $this->uri->uri_string());
            }
        }
        else{
        	//renaming
        	rename(
        		"assets/img/pendaftar/tmp/" . $this->upload->data('file_name'), 
        		"assets/img/pendaftar/tmp/" . $new_name . '.jpg' // Bodo amat, pokoknya ganti jadi jpg semua!
        	);

        	$returns = [
        		'full_path' => 'assets/img/pendaftar/tmp/'.$new_name . '.jpg',
        		'file_name' =>  $new_name . '.jpg',
        	];
        	return $returns;
        }
	}

	public function download_sertifikat($id_event, $id_pendaftar=null)
	{
		$id_event_array = explode('.', $id_event);
		array_pop($id_event_array);
		$id_event = implode('.', $id_event_array);

		// kalau ada id pendaftarnya, cari email nya lewat database, bukan session. Ini fitur alternatif buat downlaod sertifikat oleh panitia untuk membantu peserta
		if (!empty($id_pendaftar)) {
			$email = $this->Model_pendaftar->get_by_id($id_pendaftar)->row_array()['email'];
		}else{
			// kalo belum login, mental ke halaman login
			if ( empty($this->session->userdata('email')) ) {
				$this->session->set_flashdata("msg", "error#Session sudah habis. Silakan login lagi.");
				redirect( base_url() . "login" );
			}
        
			$email = $this->session->userdata('email');
		}
		
		$this->load->library('F_pdf');
		$data['pendaftar'] = $this->Model_pendaftar->check_exists( $email, $id_event )->row_array();
		$data['event'] = $this->Model_event->get_single($id_event)->row_array();
		$data['sertifikat'] = $this->Model_sertifikat->get_data_sertifikat($id_event)->row_array();

		if ( $data['pendaftar']['status'] != 'Valid' ) {
				$this->session->set_flashdata("msg", "error#Akun ini tidak berhak mendapatkan sertifikat.");
				redirect( base_url() );
		}
		
		$this->load->view('end_user/download_sertifikat', $data);
	}



	/*
	* AJAX's thing or whatever goes down there
	*/

	public function ajax_detail_event($id_event)
	{
		$data = $this->Model_event->get_single($id_event)->row_array();
		$data['panitia'] = $this->Model_panitia->get_by_id_event($id_event)->result_array();
		if ( $data['jadwal'] - time() > 0 ) {
			$data['status'] = true;
		}else{
			$data['status'] = false;
		}
		$data['jum_pendaftar'] = $this->Model_pendaftar->pendaftar_event($id_event)->num_rows();;
		$this->load->view( "end_user/home_page_detail_event", $data );
	}
}
