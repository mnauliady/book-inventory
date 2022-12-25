<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();

		// url untuk akses ke web service
		$this->API="http://localhost/book-inventory-ci2/rest_server";
	}

	// mengecek user apakah sudah login
	private function isLoggedIn(){
		if(!$this->session->userdata('id_user')) redirect(site_url("Main/login"));
	}

	// memanggil halaman tambah buku
	public function tambah_buku(){
		// user harus sudah login
		$this->isLoggedIn();

		$title = 'Tambah Buku';
		$this->load->view('templates/header_user', array("title"=>$title));
		$this->load->view('Tambah_buku.php');
		$this->load->view('templates/footer');
	}

	// aksi untuk menambah buku
	public function aksi_tambah(){
		$data = $_POST;

		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		// memanggil method pada web service
		$insert =  $this->curl->simple_post($this->API.'/C_Buku', $data, array(CURLOPT_BUFFERSIZE => 0));

		if($insert)
		{
			$this->session->set_flashdata('hasil','Insert Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Insert Data Gagal');
		}

		redirect(base_url());
	}

	// memanggil halaman update
	public function update(){
		// user harus sudah login
		$this->isLoggedIn();

		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		$title = 'Update Buku';

		$id_buku = $_GET['id_buku'];

		// memanggil method pada web service
		$data['buku'] = json_decode($this->curl->simple_get($this->API.'/C_Buku'.'?id_buku='.$id_buku));

		$this->load->view('templates/header_user', array("title"=>$title));
		$this->load->view('Update_buku.php',$data);
		$this->load->view('templates/footer');
	}

	// aksi untuk update buku
	public function aksi_update(){
		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		$data = $_POST;
		$id_buku = $_GET['id_buku'];

		// memanggil method pada web service
		$edit =  $this->curl->simple_put($this->API.'/C_Buku', $data, array(CURLOPT_BUFFERSIZE => 0));
		if($edit)
		{
			$this->session->set_flashdata('hasil','Edit Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Edit Data Gagal');
		}

		redirect('Main/detail?id_buku='.$data['id_buku']);
	}
}