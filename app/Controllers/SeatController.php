<?php namespace App\Controllers;

use App\Models\BusSeatModel;

class SeatController extends BaseController {


    
    public function showBusSeats() {
        $busSeatModel = new BusSeatModel();
        
        if($this->request->getMethod() == 'post') {
            $tripID = $this->request->getPost('tripID');
            $busSeats = $busSeatModel->getBusSeatsByTripID($tripID);
            return view('dashboard/biletBul', ['koltuklar' => $busSeats]);
        } else {
            echo "Geçersiz istek.";
        }
    }
}
