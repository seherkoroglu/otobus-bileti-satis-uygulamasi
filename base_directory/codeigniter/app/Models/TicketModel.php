<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'biletler';

    public function getTicketsByCitiesAndDate($fromCity, $toCity, $date)
    {
        return $this->db->table('biletler')
            ->select('biletler.*, seyahatlertablosu.busPlate')
            ->join('seyahatlertablosu', 'seyahatlertablosu.tripID = biletler.tripID')
            ->where('seyahatlertablosu.departureTerminalID', $fromCity)
            ->where('seyahatlertablosu.arrivalTerminalID', $toCity)
            ->where('DATE(seyahatlertablosu.departureTime)', $date)
            ->get()
            ->getResultArray();
    }
}
