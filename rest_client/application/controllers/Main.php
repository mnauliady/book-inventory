<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();

		// url untuk akses ke web service
		$this->API="http://localhost/book-inventory-ci2/rest_server";
	}

	// memberi header title
	private function loadHeader($title=''){
		$data['title'] = $title;
		//jika sudah user sudah login
		if($this->isLoggedIn()){
			$this->load->view('templates/header_user', $data);
			// add key untuk akses web service
			$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));
		}else{
			$this->load->view('templates/header', $data);
		}
	}

	// menegecek apakah user sudah login
	private function isLoggedIn(){
		if($this->session->userdata('username')) {
			return true;
		}else{
			return false;
		} 
	}

	// halaman home
	public function index(){
        $title = "Katalog Buku";        
        $this->loadHeader($title);

        if($this->isLoggedIn()){
        	$data['databuku'] = json_decode($this->curl->simple_get($this->API.'/C_Buku'));
        }else{
        	$data['databuku'] = json_decode($this->curl->simple_get($this->API.'/C_Main'));
        }

		$this->load->view('Home', $data);
        $this->load->view('templates/footer');
    }

    // memanggil halaman detail buku
	public function detail(){
		$id_buku = $_GET['id_buku'];

		$title = "Detail Buku"; 
		$this->loadHeader($title);

		if($this->isLoggedIn()){
			$data['detail'] = json_decode($this->curl->simple_get($this->API.'/C_Buku'.'?id_buku='.$id_buku));
			$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));
			$data['komen'] = json_decode($this->curl->simple_get($this->API.'/C_Komentar'.'?id_buku='.$id_buku));
		}else{
			$data['detail'] = json_decode($this->curl->simple_get($this->API.'/C_Main'.'?id_buku='.$id_buku));
			$data['komen'] = json_decode($this->curl->simple_get($this->API.'/C_Main/komentar'.'?id_buku='.$id_buku));
		}

		$this->load->view('Detail.php', $data);
		$this->load->view('templates/footer');
	}

	// memanggil halaman kategori
	public function kategori(){
		$kategori = $_GET['kategori'];

		$title = "Kategori Buku"; 
		$this->loadHeader($title);

		if($this->isLoggedIn()){
			$data['kategori'] = json_decode($this->curl->simple_get($this->API.'/C_Buku/kategori'.'?kategori='.$kategori));
		}else{
			$data['kategori'] = json_decode($this->curl->simple_get($this->API.'/C_Main/kategori'.'?kategori='.$kategori));
		}

		$this->load->view('Kategori.php', $data);
		$this->load->view('templates/footer');
	}

    // memanggil halaman login
    public function login($error=''){
        if($this->isLoggedIn()) redirect(base_url());
        $header['title'] = "Login";
        $this->load->view('templates/header', $header);        
        $this->load->view('login', array('error' => $error));
        $this->load->view('templates/footer');
    }

    // memanggil halaman register
    public function register(){
        if($this->isLoggedIn()) redirect(base_url());
        $header['title'] = "Register";
        $this->load->view('templates/header', $header);
        $this->load->view('register');
        $this->load->view('templates/footer');
    }

    // logout
    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}