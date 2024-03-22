<?php

namespace App\Models;

use CodeIgniter\Model;



class SeyahatModel extends Model
{
    protected $table = 'seyahatlertablosu';
    protected $allowedFields = ['tripID', 'departureTerminalID', 'arrivalTerminalID', 'departureTime', 'arrivalTime', 'tripType', 'busCompanyID', 'busPlate'];
}



