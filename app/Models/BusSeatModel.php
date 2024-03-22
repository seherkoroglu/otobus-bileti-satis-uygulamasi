<?php namespace App\Models;

use CodeIgniter\Model;

class BusSeatModel extends Model {
    protected $table = 'koltuklar';
    protected $allowedFields = ['tripID', 'seatNumber', 'isAvailable', 'isReserved'];

    public function getBusSeatsByTripID($tripID) {
        return $this->where('tripID', $tripID)->findAll();
    }
}

