<?php

namespace App\Controllers;

class Bilet extends BaseController
{
    public function biletBul(): string
    {
        return view('dashboard/biletBul');
    }
}
