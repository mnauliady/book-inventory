<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class C_Buku extends REST_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Buku');
    $this->config->load('rest');
  }

  // method untuk mengambil data buku 
  public function index_get(){

    $id_buku  = $this->get('id_buku');
    if ($id_buku == null){
      $data = $this->M_Buku->getDataBukuku();
    }
    else{
      $data = $this->M_Buku->getDataBukuku($id_buku);
    }

    if($data){
      $this->response($data, 200);

      $this->response([
        'status' => true,
        'data' => $data
      ], REST_Controller::HTTP_OK);
    }
    else{
      $this->response([
        'status' => false,
        'message' => 'id not found'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  // method untuk mengambil data buku berdasarkan kategori
  public function kategori_get(){
    $kategori  = $this->get('kategori');

    $data = $this->M_Buku->getKategori($kategori);

    if($data){
      $this->response($data, 200);

      $this->response([
        'status' => true,
        'data' => $data
      ], REST_Controller::HTTP_OK);
    }
    else{
      $this->response([
        'status' => false,
        'message' => 'id not found'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  // method untuk menambahkan buku
  public function index_post(){
    $data = [
      'judul' => $this->post('judul'),
      'pengarang' => $this->post('pengarang'),
      'penerbit' => $this->post('penerbit'),
      'tahun' => $this->post('tahun'),
      'halaman' => $this->post('halaman'),
      'kategori' => $this->post('kategori'),
      'deskripsi' => $this->post('deskripsi'),
      'id_user' => $this->post('id_user')

    ];

    if($this->M_Buku->createDataBuku($data) > 0){
      $this->response([
        'status' => true,
        'message' => 'data has been created'
      ], REST_Controller::HTTP_CREATED);
    }
    else{
      $this->response([
        'status' => false,
        'message' => 'fail to create new data'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  // method untuk mengedit data buku
  public function index_put(){
    $id_buku = $this->put('id_buku');

    $data = [
      'judul' => $this->put('judul'),
      'pengarang' => $this->put('pengarang'),
      'penerbit' => $this->put('penerbit'),
      'tahun' => $this->put('tahun'),
      'halaman' => $this->put('halaman'),
      'kategori' => $this->put('kategori'),
      'deskripsi' => $this->put('deskripsi'),
      'id_user' => $this->put('id_user')
    ];

    if($this->M_Buku->updateDataBuku($data, $id_buku) > 0){
      $this->response([
        'status' => true,
        'message' => 'data has been updated'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
    else{
      $this->response([
        'status' => false,
        'message' => 'fail to update data'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

}
