<?php
// application/controllers/Login.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function giris() {
        $this->load->view('login');
    }

    public function login_process() {
        $username = $this->input->post('seher');
        $password = $this->input->post('1234');

        // Burada giriş işlemleri yapılacak, kullanıcı adı ve şifre kontrolü gibi.
        // Örnek olarak sadece ekrana basıyoruz, gerçek uygulamada veritabanı gibi bir kaynak kullanılmalıdır.
        echo "Kullanıcı Adı: " . $username . "<br>";
        echo "Şifre: " . $password;
    }
}
