<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_member");

		$this->website = $this->Model_detail_organisasi->get()->row_array();
	}

	public function index()
	{
		if ( isset($_GET['balik']) ) { //<-- simpen dulu di session
			$_SESSION['balik'] = $_GET['balik'];
		}
		if ( !empty($this->session->userdata('email')) ) {
			$this->session->set_flashdata("msg", "none#Selamat datang kembali.");
			redirect( base_url() . "admin/dashboard" );
			die;
		}

		//**
	    // Login with Google
	    //**

		    //include the google OAuth configuration
		    require("assets/google_api/vendor/autoload.php");
		    //Step 1: Enter you google account credentials

			$jwt = new \Firebase\JWT\JWT;
			$jwt::$leeway = 5*60; // adjust this value

			// we explicitly pass jwt object whose leeway is set to 60
			$g_client = new \Google_Client(['jwt' => $jwt]);


			$g_client->setClientId("91581392252-74f54bcmp6jfaj5vs5u3tt4knnuo0err.apps.googleusercontent.com");
	 		$g_client->setClientSecret("5HRKlfbfMmYVu1Fv3204jNyh");
	 		$g_client->setRedirectUri( base_url('login') );
	 		$g_client->addScope("email");
	 		$g_client->addScope("profile");


		    //Step 2 : Create the url
		    $auth_url = $g_client->createAuthUrl();
		    $data['auth_url'] = $auth_url;

		    //Step 3 : Get the authorization  code
		    $code = isset($_GET['code']) ? $_GET['code'] : NULL;

		    //Step 4: Get access token
		    if (isset($code)) {

		      try {

		        $token = $g_client->fetchAccessTokenWithAuthCode($code);
		        $g_client->setAccessToken($token);
		      } catch (Exception $e) {
		        $e->getMessage();
		      }

		      try {
		        $pay_load = $g_client->verifyIdToken(); // ini kalo berhasil

		      } catch (Exception $e) {
		        $e->getMessage();
		        $this->session->set_flashdata('msg', 'error#Silakan coba lagi.' . $e->getMessage() ); // <-- untuk testing
		        redirect( base_url() . $this->uri->uri_string() );
		      }
		    } else {
		      $pay_load = null;
		    }

	    //**
	    // /.Login with Google
	    //**

        if ( !empty($pay_load) ) {
        	$check_email = $this->Model_member->check_member($pay_load["email"]);
        	if ( $check_email == false ) //<-- kalau bukan anggota organisasi
        	{
        		$this->guest_login($pay_load);
        	}
        	else
        	{
        		$this->session->set_flashdata('msg', 'success#Selamat datang, '. $pay_load['name'] .'.');
        		$this->session->set_userdata($pay_load);
        		$this->Model_member->set_member_log($pay_load['name']);
        		if ( isset($_SESSION['balik']) ) { // <-- balik ke halaman sebleum login
        			redirect( base64_decode($_SESSION['balik']) );
        		}
        		else{
        			redirect( base_url() . 'admin/dashboard' );
        		}
        		
        	}
        }

		$this->load->view('member/login', $data);
	}

	public function guest_login($pay_load)
	{
		$pay_load['guest'] = 1; //<-- set guest sebagai penanda

		$this->session->set_userdata($pay_load);
		$this->session->set_flashdata('msg', 'success#Selamat datang, '. $pay_load['name'] .'. Anda kini dapat mendaftar event memakai akun ini.');
		if ( isset($_SESSION['balik']) ) {
			redirect( base64_decode($_SESSION['balik']) );
		}
		else{
			redirect( base_url() );
		}
	}
}
