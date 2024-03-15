<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_process()
    {
        $request = service('request');

        // Form verilerini al
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        // Kullanıcı adı ve şifre kontrolü
        $correct_username = "seher"; // Örnek olarak sabit bir değer
        $correct_password = "1234"; // Örnek olarak sabit bir değer

        if ($username === $correct_username && $password === $correct_password) {
            // Kullanıcı doğru bilgileri girdiyse, başka bir sayfaya yönlendirme
            return redirect()->to('./index'); // index sayfasına yönlendir
        } else {
            // Kullanıcı adı veya şifre yanlışsa, hata mesajı gösterme veya tekrar giriş yapma sayfasına yönlendirme
            echo view('login', ['error' => 'Kullanıcı adı veya şifre yanlış.']);
        }
    }
}
