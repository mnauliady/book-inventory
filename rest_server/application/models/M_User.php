<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Model untuk tabel user
class M_User extends CI_Model {

  private $table_name;

  public function __construct($table='tabel_user')
  {
    $this->table_name =  $table ;
  }

  //mengambil data semua user
  public function getAllUsers(){
    return $this->db->get($this->table_name)->result();
  }

  //mengambil data satu user
  public function getUser($data){
    return $this->db->get_where($this->table_name, $data)->row();
  }

  //mencari data username untuk proses registrasi
  private function findUsername($username){
    $data = [
      'username' => $username,
    ];

    //count row
    $result = $this->db->where($data)->count_all_results($this->table_name);

    return $result;
  }

  //mencari data username untuk proses registrasi
  private function findEmail($email)
  {
    $data = [
      'email' => $email,
    ];

    //count row
    $result = $this->db->where($data)->count_all_results($this->table_name);

    return $result;
  }

  //menambahkan data baru
  public function insert($data)
  {

    // jika terdapat username dan email yg sama pada db maka return null
    if(($this->findUsername($data['username'])>0) || ($this->findEmail($data['email'])>0))
      return null;
    
    $this->db->insert($this->table_name, $data);
    return $this->db->affected_rows();
  }

}
