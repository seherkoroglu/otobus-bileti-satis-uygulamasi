<?php
<<<<<<< HEAD
=======
// application/controllers/Login.php

>>>>>>> b83a173d17c0434fa06d7faf83e976fce2eb4c01
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

<<<<<<< HEAD
    public function index() {
        // login.php dosyasını yükle
        $this->load->view('login');
    }
}

=======
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
>>>>>>> b83a173d17c0434fa06d7faf83e976fce2eb4c01
