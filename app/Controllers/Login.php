<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        // login.php dosyasını yükle
        $this->load->view('login');
    }
}

