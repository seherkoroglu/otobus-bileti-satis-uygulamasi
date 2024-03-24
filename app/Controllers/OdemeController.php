<?php

namespace App\Controllers;
use App\Libraries\ShopierPayment;
use App\Libraries\Iyzico;

class OdemeController extends BaseController
{
    public function index()
    {
        return view('dashboard/odeme');
    }

    public function cart(){

        return view('dashboard/cart');
    }

    public function payment(){
        // $productID=1234
        // $shopierPayment = new ShopierPayment();
        // $shopierPayment->setPayment(
        //     [
        //         'id' => 101,
        //         'name' => 'Erkin',
        //         'surname' => 'Eren',
        //         'email' => 'eren@erkin.net',
        //         'phone' => '8503023601',
        //     ],
        //     [
        //         'address' => 'Kızılay Mh.',
        //         'city' => 'Ankara',
        //         'country' => 'Turkey',
        //         'postcode' => '06100',
        //     ], $productID, '1000.0', 'Bilet'
          
        // )->redirectPaymentPage();
        $iyzico = new Iyzico();
       $payment= $iyzico->setForm([
            'locale' => 'tr',
            'conversationId' => '123456789',
            'price' => '1000.0',
            'paidPrice' => '1000.0',
            'basketId' => 'SPT12345'
        ])->buyer([
            'id' => '123456789',
            'name' => 'Erkin',
            'surname' => 'Eren',
            'gsmNumber' => '8503023601',
            'email' => 'abc@abc.com',
            'identityNumber' => '123456789',
            'registrationAddress' => 'alıcı adresi ankara',
            'ip' => $this->request->getIPAddress(),
            'city' => 'Ankara',
            'country' => 'Turkey',
            
        ])->setShipping([
            'contactName' => 'Erkin Eren',
            'city' => 'Ankara',
            'country' => 'Turkey',
            'address' => 'Kargonun gideceği adres',
        ])->setItems([
            [
                'id' => '123456789',
                'name' => 'Bilet',
                'category' => 'Bilet',
                "itemType"=>"PHYSICAL",
                'price' => '1000.0',
            ]
        ])->paymentForm();
        
        



        return view('dashboard/odeme', 
        [

            
            'paymentStatus'=> $payment->getStatus(),
           
        ]);

    }
}
