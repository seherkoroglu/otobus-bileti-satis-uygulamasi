<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SeferlerController extends Controller
{
    public function index()
    {
        $data['seferler'] = [
            (object)["kalkis" => "İstanbul", "varis" => "Ankara", "saat" => "08:00", "fiyat" => 200],
            (object)["kalkis" => "İstanbul", "varis" => "İzmir", "saat" => "10:30", "fiyat" => 250],
            (object)["kalkis" => "Ankara", "varis" => "Antalya", "saat" => "12:00", "fiyat" => 300],
            (object)["kalkis" => "İzmir", "varis" => "İstanbul", "saat" => "14:00", "fiyat" => 220],
            (object)["kalkis" => "Antalya", "varis" => "Ankara", "saat" => "16:30", "fiyat" => 320],
        ];

        return view('seferler', $data);
    }
}

