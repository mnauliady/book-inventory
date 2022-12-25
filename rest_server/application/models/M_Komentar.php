<?php

class M_Komentar extends CI_Model{

  // mengambil data komentar dari database
	public function getDataKomentar($id_buku){
    $this->db->select('*');
    $this->db->from('tabel_komentar');
    $this->db->join('tabel_user', 'tabel_komentar.id_user = tabel_user.id_user');
    $this->db->where('id_buku ='. $id_buku);
    $query = $this->db->get()->result_array();
    return $query;
  }

  // menambahkan komentar ke database
  public function createDataKomentar($data){
    $this->db->insert('tabel_komentar',$data);
   	return $this->db->affected_rows();
  }

  // mengambil data komentar dari database
  public function getDataKomen($id_komen){
    return $this->db->get_where('tabel_komentar', ['id_komen'=>$id_komen])->result_array();
  }

  // update data komentar
  public function updateDataKomen($data, $id_komen){
    $this->db->update('tabel_komentar',$data,['id_komen'=>$id_komen]);
    return $this->db->affected_rows();
  }

  // delete data komentar
  public function deleteDataKomen($id_komen){
    $this->db->delete('tabel_komentar', ['id_komen'=>$id_komen]);
    return $this->db->affected_rows();
  }
}