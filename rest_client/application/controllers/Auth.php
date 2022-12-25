<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct(){
        parent::__construct();

        // url untuk akses ke web service
        $this->API = "http://localhost/book-inventory-ci2/rest_server";
    }

    // untuk aksi login
    public function verify(){
        $data = $this->input->post();

        // memanggil web service
        $user = json_decode($this->curl->simple_post($this->API.'/C_User/login', $data));

        //jika user tidak ada
        if(empty($user)){
            redirect(site_url("Main/login/notfound"));
        }

        // jika user ada maka set session dengan iduser, username, key
        $this->session->set_userdata('id_user', $user->id_user);
        $this->session->set_userdata('username', $user->username);
        $this->session->set_userdata('key', $user->key);
        redirect(base_url());

    }

    // untuk aksi register
    public function register(){
        $data = $this->input->post();
        $judul['title'] = "Error Register";

        // memanggil web service
        $res = json_decode($this->curl->simple_post($this->API.'/C_User/register', $data));

        // jika username atau email sudah terdaftar
        if(empty($res)){
            $this->load->view('templates/header', $judul);
            $this->load->view('Error_Register');
            $this->load->view('templates/footer');
        }else{
            // jika sukses panggil method verify
            $this->verify();
        }

    }

}

?>