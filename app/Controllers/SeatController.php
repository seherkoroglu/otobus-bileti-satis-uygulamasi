<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BusSeatModel;
use App\Models\SeyahatModel;

class SeatController extends BaseController
{
    public function reserveSeats()
    {
        // Form verilerini al
        $numPassengers = $this->request->getPost('numPassengers');
        $genderPreference = $this->request->getPost('genderPreference');
        $age = $this->request->getPost('age');
        $discountType = $this->request->getPost('discountType');
        $tripID = $this->request->getPost('tripID'); // Seçilen seyahatin ID'sini al
        $seyahatModel = new SeyahatModel();
        $selected_trip = $seyahatModel->find($tripID);
        

        // Koltuk modelini yarat
        $seatModel = new BusSeatModel();

        // Koltukları ekle
        for ($i = 0; $i < $numPassengers; $i++) {
            // Koltuğu veritabanına ekle
            $seatModel->insert([
                'tripID' => $tripID, // Trip ID'sini buraya ekleyin
                'seatNumber' => $i + 1,
                'isAvailable' => true, // Varsayılan olarak true olarak ayarlayabilirsiniz, satışa göre değiştirebilirsiniz
                'isReserved' => false, // Varsayılan olarak false olarak ayarlayabilirsiniz
                'isSold' => false, // Varsayılan olarak false olarak ayarlayabilirsiniz
                'tripType' => $selected_trip['tripType'], // Trip tipini buradan alın
                'genderPreference' => $genderPreference,
                'age' => $age,
                'discountType' => $discountType
            ]);
        }

        return redirect()->to('/dashboard'); // Kullanıcıyı başka bir sayfaya yönlendir
    }

    public function buySeats(){
        $seatModel = new BusSeatModel();
        $tripID = $this->request->getPost('tripID');
        $seatNumbers = $this->request->getPost('seatNumbers');
        $seatModel->whereIn('seatNumber', $seatNumbers)->set(['isSold' => true])->update();
        return redirect()->to('/dashboard');
    }
}


