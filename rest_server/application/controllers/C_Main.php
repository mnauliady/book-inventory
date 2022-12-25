<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class C_Main extends REST_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Buku');
    $this->load->model('M_Komentar');

    // load file config rest
    $this->config->load('rest');

    // method rest_enable_keys pada rest di false kan karena controller ini tidak memerlukan login dan key(token) terlebih dahulu untuk akses
    $this->config->set_item('rest_enable_keys', FALSE);
  }

  // mengambil data buku
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

  // mengambil data buku berdasarkan kategori
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

  // mengambil data komentar
  public function komentar_get(){
    $id_buku  = $this->get('id_buku');

    $data = $this->M_Komentar->getDataKomentar($id_buku);
    
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
}
