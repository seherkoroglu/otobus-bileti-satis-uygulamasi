<?php

namespace App\Controllers;

use App\Models\SeyahatModel;
use App\Models\TerminallerModel;

class SearchController extends BaseController

{
    public function search()
    {
        return view('dashboard/searchResults');
    }

}