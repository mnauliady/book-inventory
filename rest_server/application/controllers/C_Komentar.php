<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class C_Komentar extends REST_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Komentar');
    $this->config->load('rest');
  }

  // method untuk mengambil data komentar berdasarkan id buku
  public function index_get(){
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

  // metdhod untuk mengambil data komentar berdasarkan id komen
  public function komen_get(){
    $id_komen  = $this->get('id_komen');

    $data = $this->M_Komentar->getDataKomen($id_komen);
    
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

  // method untuk delete data buku
  public function index_delete(){
    $id_komen = $this->delete('id_komen');

    if ($id_komen==null){
      $this->response([
        'status' => false,
        'message' => 'provide an id'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
    else{
      if($this->M_Komentar->deleteDataKomen($id_komen) >0 ){
        $this->response([
          'status' => true,
          'id' => $id_komen,
          'message' => 'deleted'
        ], REST_Controller::HTTP_NO_CONTENT);
      }
      else{
        $this->response([
          'status' => false,
          'message' => 'id not found'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  // method untuk menambahkan data buku
  public function index_post(){
    $data = [
      'komentar' => $this->post('komentar'),
      'waktu' => $this->post('waktu'),
      'id_buku' => $this->post('id_buku'),
      'id_user' => $this->post('id_user')
    ];

    if($this->M_Komentar->createDataKomentar($data) > 0){
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
    $id_komen = $this->put('id_komen');

    $data = [
      'komentar' => $this->put('komentar'),
      'waktu' => $this->put('waktu'),
      'id_buku' => $this->put('id_buku'),
      'id_user' => $this->put('id_user')
    ];

    if($this->M_Komentar->updateDataKomen($data, $id_komen) > 0){
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
