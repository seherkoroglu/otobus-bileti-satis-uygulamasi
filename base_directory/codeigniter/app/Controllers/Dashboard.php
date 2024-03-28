<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard/index');
    }

    public function showBusSeats(): string
    {
        return view('dashboard/biletBul');
    }

    public function search(): string
    {
        return view('dashboard/searchResults');
    }

    
}