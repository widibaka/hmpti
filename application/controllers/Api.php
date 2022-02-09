<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('HTTP/1.1 200 OK');  
header('Content-type: application/json');
class Api extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_member");
	}
	public function get_anggota()
	{
		$data_anggota = $this->Model_member->get_all_and_join()->result_array();

    $response = array();

    $response['success'] = true;
    // tapi kalau data anggotanya tidak ketemu di database, maka beri nilai false
    if ( empty($data_anggota) ) {
      $response['success'] = false;
    }

    $response['result'] = $data_anggota;

    echo json_encode($response);
    // {'success':true,'result':<the result>}
	}

}