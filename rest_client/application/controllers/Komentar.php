<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

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

	// Memanggil halaman untuk menambahkan komentar
	public function tambah_komentar(){
		// user harus sudah login
		$this->isLoggedIn();

		$title = 'Tambah Komentar';

		$id_buku = $_GET['id_buku'];
		$id_user = $_GET['id_user'];

		$this->load->view('templates/header_user', array("title"=>$title));
		$this->load->view('tambah_komentar.php',$id_buku, $id_user);
		$this->load->view('templates/footer');
	}

	// aksi menambah komentar
	public function aksi_tambah(){
		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		$data = $_POST;

		// memanggil method pada web service
		$insert =  $this->curl->simple_post($this->API.'/C_Komentar', $data, array(CURLOPT_BUFFERSIZE => 0));

		if($insert)
		{
			$this->session->set_flashdata('hasil','Insert Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Insert Data Gagal');
		}

		redirect('Main/detail?id_buku='.$data['id_buku']);
	}

	// memanggil halaman update
	public function update(){
		// user harus sudah login
		$this->isLoggedIn();

		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		$title = 'Edit Komentar';

		$id_komen = $_GET['id_komen'];

		// memanggil method pada web service
		$data['komentar'] = json_decode($this->curl->simple_get($this->API.'/C_Komentar/Komen'.'?id_komen='.$id_komen));

		$this->load->view('templates/header_user', array("title"=>$title));
		$this->load->view('Update_komentar.php',$data);
		$this->load->view('templates/footer');
	}

	// aksi untuk update
	public function aksi_update(){
		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		$data = $_POST;
		$id_komen = $_GET['id_komen'];

		// memanggil method pada web service
		$edit =  $this->curl->simple_put($this->API.'/C_Komentar', $data, array(CURLOPT_BUFFERSIZE => 0));
		if($edit)
		{
			$this->session->set_flashdata('hasil','Edit Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Edit Data Gagal');
		}

		redirect('Main/detail?id_buku='.$data['id_buku']);
	}

	// aksi untuk delete
	public function Delete(){
		// add key untuk akses web service
		$this->curl->http_header("X-API-KEY", $this->session->userdata('key'));

		$id_komen = $_GET['id_komen'];

		// memanggil method pada web service
		$delete =  $this->curl->simple_delete($this->API.'/C_Komentar', array('id_komen'=>$id_komen), array(CURLOPT_BUFFERSIZE => 10));
		if($delete)
		{
			$this->session->set_flashdata('hasil','Delete Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Delete Data Gagal');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}