<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_event");
		$this->load->model("Model_pendaftar");
		$this->load->model("Model_detail_organisasi");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index($id_event)
	{
		$data['title'] = "Event";
		$data['subtitle'] = "Pendaftar";

		$data['event'] = $this->Model_event->get_single($id_event)->row_array();

		$data['average_bintang'] = $this->Model_pendaftar->average_bintang($id_event);
		
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/pendaftar', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/pendaftar_js', $data);

	}

	public function unset($id_pendaftar='')
	{
		$status = $this->Model_pendaftar->set_status('Unset', $id_pendaftar);
		$response = [
			'status' => $status,
			'data' => $id_pendaftar.', Unset',
		];
		echo json_encode( $response );
	}
	public function valid($id_pendaftar='')
	{
		$status = $this->Model_pendaftar->set_status('Valid', $id_pendaftar);
		$response = [
			'status' => $status,
			'data' => $id_pendaftar.', Valid',
		];
		echo json_encode( $response );
	}
	public function invalid($id_pendaftar='')
	{
		$status = $this->Model_pendaftar->set_status('Invalid', $id_pendaftar);
		$response = [
			'status' => $status,
			'data' => $id_pendaftar.', Invalid',
		];
		echo json_encode( $response );
	}


	public function export_excel($status='', $id_event)
	{
		if ( empty($status) ) {
			die("DUH");
		}else{
			$data['main_data'] = $this->Model_pendaftar->get_by_status($status,$id_event)->result_array();
			$data['event'] = $this->Model_event->get_single($id_event)->row_array();
			$data['status'] = $status;
			$this->load->view("member/pendaftar_export_excel", $data);
		}
	}

	public function get_data_tambahan($id_pendaftar)
	{
		$data = $this->Model_pendaftar->get_by_id($id_pendaftar)->row_array()['data_tambahan'];
		$data = json_decode($data, true);

		$to_be_printed = "<div>";
		foreach ($data as $key => $value) {
			$key2 = str_replace( '_', ' ', $key );
			$to_be_printed .= "<p><strong>{$key2}</strong> : {$value}</p>";
		}
		$to_be_printed .= "</div>";
		echo $to_be_printed;
	}


	// DATATABLES
		public function get_data( $id_event )
		{

		    $list = $this->Model_pendaftar->get_datatables( $id_event );
		    // var_dump( $list ); die();
		    $data = array();
		    $no = $_POST['start'];
		    // var_dump($list); die;
		    foreach ($list as $field) {
		      
		        $row = array();
	            $row[] = $field->email;
		        $row[] = $field->nama;

		        	if ( empty($field->kehadiran) ) {
		        		$url_kehadiran = base_url().'assets/img/no_image.jpg';
		        	}else{
		        		$url_kehadiran = base_url().'assets/img/pendaftar/'.$field->kehadiran;
		        	}
		        $row[] = '<a data-fancybox="gallery" href="'. $url_kehadiran .'"><img src="'.$url_kehadiran.'" height="90"></a>';



		        	if ( empty($field->pembayaran) ) {
		        		$url_pembayaran = base_url().'assets/img/no_image.jpg';
		        	}else{
		        		$url_pembayaran = base_url().'assets/img/pendaftar/'.$field->pembayaran;
		        	}
		        $row[] = '<a data-fancybox="gallery" href="'. $url_pembayaran .'"><img src="'.$url_pembayaran.'" height="90"></a>';



		        	$bintang = '';
		        	for ($i=0; $i < $field->bintang; $i++) { 
		        		$bintang .= '<i class="fa fa-star text-warning"></i>';
		        	}
		        $row[] = $bintang;


							$readmore = '';
							if ( strlen($field->saran) > 30 ) {
								$readmore = '...' . ' <a href="javascrip:void(0)" data-toggle="modal" data-target="#modal-default" onclick="saran_more(\''. htmlentities($field->saran) .'\')">read more</a>';
							}
							
		        $row[] = substr($field->saran, 0, 30).$readmore;
		        $row[] = '<button type="button" class="btn btn-primary" onclick="show_data_tambahan(\'' . $field->id_pendaftar . '\')">Data Tambahan</button>';

						// Waktu
		        $row[] = $field->waktu;


						// Action buttons (Status)
		        	$color = '';
		        	if ( $field->status == 'Unset' ) {
		        		$color = 'default';
		        	}else if ( $field->status == 'Valid' ) {
		        		$color = 'success';
		        	}else if ( $field->status == 'Invalid' ) {
		        		$color = 'danger';
		        	}
		        	$btn = '
		         			<button type="button" class="btn btn-'.$color.' dropdown-toggle" data-toggle="dropdown" id="status-'.$field->id_pendaftar.'">
				              '.$field->status.'
				            </button>
				            ';
				    $drop_items= '
				    		<div class="dropdown-menu"  role="menu">
				              <a class="dropdown-item" href="javascript:void(0)" onclick="unset(\''.$field->id_pendaftar.'\')">Unset</a>
				              <a class="dropdown-item" href="javascript:void(0)" onclick="valid(\''.$field->id_pendaftar.'\')">Valid</a>
				              <a class="dropdown-item" href="javascript:void(0)" onclick="invalid(\''.$field->id_pendaftar.'\')">Invalid</a>
											<hr>
				              <a target="_blank" class="dropdown-item" href="' . base_url() . 'p/download_sertifikat/'.$id_event.'.pdf/'.$field->id_pendaftar.'">Download Sertifikat</a>
				            </div>
				            ';
		        $row[] = $btn.$drop_items;


		
		        $data[] = $row;
		    }
		
		    $output = array(
		        "draw" => $_POST['draw'],
		        "recordsTotal" => $this->Model_pendaftar->count_all($id_event),
		        "recordsFiltered" => $this->Model_pendaftar->count_filtered($id_event),
		        "data" => $data,
		    );
		    //output dalam format JSON
		    echo json_encode($output);
		}
	// DATATABLES

}