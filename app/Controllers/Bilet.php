<?php

namespace App\Controllers;

use App\Models\SeyahatModel;
use App\Models\TerminallerModel;


class Bilet extends BaseController
{
    public function biletBul()

    {
        // $db = \Config\Database::connect();
        // $selectedSeyahatID = $this->request->getPost('tripID');

        // if (!empty($selectedSeyahatID)) {
        //     $model = new SeyahatModel();
        //     $selectedSeyahat = $model->find($selectedSeyahatID);
        //     $data['selectedSeyahat'] = $selectedSeyahat;
        // } else {
        //     $data['selectedSeyahat'] = null;
        // }
    
        return view('dashboard/biletBul');
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