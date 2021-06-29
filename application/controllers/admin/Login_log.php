<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_log extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_member_login_log");
		$this->load->model("Model_detail_organisasi");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Login log";
		$data['subtitle'] = "Login log";
		
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/login_log', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/login_log_js', $data);

	}


	// DATATABLES
		public function get_data(  )
		{
		    $list = $this->Model_member_login_log->get_datatables(  );
		    // var_dump( $list ); die();
		    $data = array();
		    $no = $_POST['start'];
		    // var_dump($list); die;
		    foreach ($list as $field) {
		      
		        $row = array();
	            $row[] = $field->id;
		        $row[] = $field->nama;
		        $row[] = date( "d M Y, H:m", $field->time );

		
		        $data[] = $row;
		    }
		
		    $output = array(
		        "draw" => $_POST['draw'],
		        "recordsTotal" => $this->Model_member_login_log->count_all(),
		        "recordsFiltered" => $this->Model_member_login_log->count_filtered(),
		        "data" => $data,
		    );
		    //output dalam format JSON
		    echo json_encode($output);
		}
	// DATATABLES

}