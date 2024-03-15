<?php
// app/Controllers/JourneysController.php

namespace App\Controllers;

use CodeIgniter\Controller;

class JourneysController extends Controller {
    
    public function __construct() {
        // Constructor
    }
    
    public function index() {
        // Burada seferleri bulmak için gerekli kodlarınızı yazın
        // Örneğin, veritabanından seferleri çekebilir veya başka bir işlem yapabilirsiniz
        
        // Örnek bir veritabanı sorgusu:
        // $seferlerModel = new \App\Models\SeferlerModel();
        // $seferler = $seferlerModel->findAll();
        
        // Daha sonra bu seferleri bir view'e geçirebiliriz
        // Örneğin:
        // return view('seferler_view', ['seferler' => $seferler]);
        
        // Eğer işlem tamamlandıysa, seferlerin olduğu bir view'e yönlendirme yapabiliriz
        return view('journeys');
    }
}

