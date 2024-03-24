<?php namespace App\Controllers;

use App\Models\BusSeatModel;

use App\Models\SeyahatModel;


class SeatController extends BaseController {
    public function reserveSeats() {
       
       $validation = $this->validate([
            'tripID' => 'required',
            'tripType' => 'required',
            'genderPreference' => 'required',
            'age' => 'required',
            'discountType' => 'required',
            'selectedSeats' => 'required',
          
            

      ]);
      if(!$validation){
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }else{
                
        // Veritabanı modelini yükle
        $busSeatModel = new BusSeatModel();
    
        // Form verilerinden tripID ve tripType değerlerini al
        $tripID = $busSeatModel->where('tripID', $this->request->getPost('tripID'))->first();
        if(!$tripID){
            return redirect()->back()->with('fail', 'Seçilen sefer bulunamadı.');
        }
        $seyahatModel = new SeyahatModel();
        $tripID = $this->request->getPost('tripID');
        $seyahat = $seyahatModel->find($tripID);
        if(!$seyahat){
            return redirect()->back()->with('fail', 'Seçilen sefer bulunamadı.');
        }

        $tripType = $this->request->getPost('tripType');
        
        // Diğer form verilerini al
       
        $genderPreference = $this->request->getPost('genderPreference');
        $selectedAge = $this->request->getPost('age');
        $selectedDiscount = $this->request->getPost('discountType');
        $selectedSeats = $this->request->getPost('selectedSeats');
        $numPassangers= count($selectedSeats);

    
       
       

        if (!is_array($selectedSeats) || empty($selectedSeats)) {
            $selectedSeats = [];
        }
    
      
    
        // Seçilen koltukları veritabanına eklemek için döngü oluştur
        foreach ($selectedSeats as $seatNumber) {
            // Koltuğu eklemek için veri hazırla
           $data = [
        'tripID' => $tripID,
        'seatNumber' => $seatNumber,
        'isAvailable' => 0,
        'isReserved' => 1,
        'isSold' => 0,
        'tripType' => $tripType,
        'genderPreference' => $genderPreference,
        'age' => $selectedAge[$seatNumber], // Farklı yaşlar için düzeltilmiş hali
        'discountType' => $selectedDiscount[$seatNumber], // Farklı indirim türleri için düzeltilmiş hali
    ];

            $query =  $busSeatModel->insert($data);
            if ($query) {
                echo "Koltuk başarıyla rezerve edildi.";
            } else {
                echo "Koltuk rezerve edilirken bir hata oluştu.";
            }

        }
       
            
        
  
    }

      
     

    }

}


