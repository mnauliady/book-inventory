<?php

class M_Buku extends CI_Model{

  // mengambil data buku dari database
  public function getDataBukuku($id_buku = null){
    if ($id_buku == null){
      return $this->db->get('tabel_buku')->result_array();
    }
    else {
      return $this->db->get_where('tabel_buku', ['id_buku'=>$id_buku])->result_array();
    }
  }

  // mengambil data buku berdasarkan kategori dari database
  public function getKategori($kategori = null){
    $this->db->like('kategori', $kategori); 
    return $this->db->get('tabel_buku')->result_array();
  }

  // menambahkan data buku ke database
  public function createDataBuku($data){
    $this->db->insert('tabel_buku',$data);
    return $this->db->affected_rows();
  }
    
  // update data buku
  public function updateDataBuku($data, $id_buku){
    $this->db->update('tabel_buku',$data,['id_buku'=>$id_buku]);
    return $this->db->affected_rows();
  }
}