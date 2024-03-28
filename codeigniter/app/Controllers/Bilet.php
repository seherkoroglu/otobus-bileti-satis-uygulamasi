<?php

namespace App\Controllers;

use App\Models\SeyahatModel;
use App\Models\TerminallerModel;

    class Bilet extends BaseController
    {
        public function biletBul()
        {
            $tripID = $this->request->getPost('tripID'); // Seçilen seyahatin ID'sini al
        
            // Trip ID ile seyahat detaylarını çek
            $seyahatModel = new SeyahatModel();
            $selected_trip = $seyahatModel->find($tripID);
        
            // Seyahatin ayrıntılarını almak için terminal modellerini kullan
            $departureTerminalModel = new TerminallerModel();
            $arrivalTerminalModel = new TerminallerModel();
        
            // Seyahatin kalkış terminalini al
            $departureTerminal = $departureTerminalModel->find($selected_trip['departureTerminalID']);
        
            // Seyahatin varış terminalini al
            $arrivalTerminal = $arrivalTerminalModel->find($selected_trip['arrivalTerminalID']);
        
            // Seyahat detaylarını view'e aktar
            $data['selected_trip'] = $selected_trip;
            $data['departureTerminal'] = $departureTerminal;
            $data['arrivalTerminal'] = $arrivalTerminal;
        
            return view('dashboard/biletBul', $data);
        } 

    public function biletAra()
    {
        $model = new SeyahatModel();
        $inputFrom = $this->request->getPost('inputFrom');
        $inputTo = $this->request->getPost('inputTo');
        $inputDate = $this->request->getPost('inputDate');
        $inputStatus = $this->request->getPost('inputStatus');

        $db = \Config\Database::connect();

        $seyahatler = $model->table('seyahatlertablosu')
            ->select('tripID, tripType, departureTime, arrivalTime, departure.city AS departureCity, arrival.city AS arrivalCity, departure.terminalName AS departureTerminal, arrival.terminalName AS arrivalTerminal, busCompanyID, busPlate')
            ->join('terminaller AS departure', 'departure.terminalID = seyahatlertablosu.departureTerminalID')
            ->join('terminaller AS arrival', 'arrival.terminalID = seyahatlertablosu.arrivalTerminalID')
            ->where('departure.city', $inputFrom)
            ->where('arrival.city', $inputTo)
            ->where('DATE(departureTime)', $inputDate)
            ->whereIn('tripType', [$inputStatus])
            ->findAll();

        $data['seyahatler'] = $seyahatler;



        // Sonuçları view'e göndermek için view() fonksiyonunu kullanarak
        return view('dashboard/searchResults', $data);
    }
    



}




