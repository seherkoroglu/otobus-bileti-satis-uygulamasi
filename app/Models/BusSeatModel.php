<?php namespace App\Models;

use CodeIgniter\Model;

class BusSeatModel extends Model {
    protected $table = 'koltuklar';
    protected $primaryKey = 'seatID';
    protected $allowedFields = [ 'tripID', 'seatNumber', 'isAvailable', 'isReserved','isSold', 'tripType', 'genderPreference', 'age', 'discountType' ];
    
}

