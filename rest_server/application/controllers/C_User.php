<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class C_User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);     
        $this->load->model("M_User");

        // load file config rest
        $this->config->load('rest');

        // method rest_enable_keys pada rest di false kan karena controller ini tidak memerlukan login dan key(token) terlebih dahulu untuk akses
        $this->config->set_item('rest_enable_keys', FALSE);
    }

    // method untuk login
    function login_post() {
        $data = array(
            'username'   =>  $this->input->post('username'),
            'password'   =>  $this->input->post('password')
        );
        
        $result = $this->M_User->getUser($data);

        $this->response($result, 200);
    }

    // method untuk register
    function register_post() {
        $data = array(
            'username' =>  $this->input->post('username'),
            'password' =>  $this->input->post('password'),
            'key'      =>  md5($this->input->post('username')),
            'email'   =>  $this->input->post('email')
        );
        
        $insert = $this->M_User->insert($data);

        if ($insert) {
            $this->response($insert, 200);
        } else {
            $this->response($insert, 502);
        }
    }

}
?>