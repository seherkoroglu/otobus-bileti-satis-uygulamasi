<?php 

namespace App\Libraries;

class Iyzico
{
    protected $options;
    protected $request;
    protected $basketItems;
    public function __construct()
    
    {
        $this->options = new \Iyzipay\Options();
        $this->options->setApiKey("sandbox-5eF9Gkgr0aYhyDqFK5usJ5U3uPoaagVv");
        $this->options->setSecretKey("sandbox-CXPEOicndZBU5KjPYT9G6Yi0S6sm8XWR");
        $this->options->setBaseUrl("https://sandbox-api.iyzipay.com");
        $this->basketItems=[];
    }

    public function setForm(Array $params){
        $this->request = new \Iyzipay\Request\CreatePaymentRequest();
$this->request->setLocale(\Iyzipay\Model\Locale::TR);
$this->request->setConversationId($params['conversationId']);
$this->request->setPrice($params['price']);
$this->request->setPaidPrice($params['paidPrice']);
$this->request->setCurrency(\Iyzipay\Model\Currency::TL);
$this->request->setInstallment(1);
$this->request->setBasketId($params['basketId']);
$this->request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
$this->request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
return $this;
    }


    public function buyer(Array $params){
       $buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($params['id']);
$buyer->setName($params['name']);
$buyer->setSurname($params['surname']);
$buyer->setGsmNumber($params['gsmNumber']);
$buyer->setEmail($params['email']);
$buyer->setIdentityNumber($params['identityNumber']);
$buyer->setRegistrationAddress($params['registrationAddress']);
$buyer->setIp($params['ip']);
$buyer->setCity($params['city']);
$buyer->setCountry($params['country']);

$this->request->setBuyer($buyer);
return $this;

    }

    public function setShipping(Array $params){

        $shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName($params['contactName']);
$shippingAddress->setCity($params['city']);
$shippingAddress->setCountry($params['country']);
$shippingAddress->setAddress($params['address']);

$this->request->setShippingAddress($shippingAddress);
return $this;
    }

    public function setBilling(Array $params){
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($params['contactName']);
        $billingAddress->setCity($params['city']);
        $billingAddress->setCountry($params['country']);
        $billingAddress->setAddress($params['address']);
       
        $this->request->setBillingAddress($billingAddress);
        return $this;


}
public function setItems(Array $items){
    foreach($items as $item){
        $basketItem = new \Iyzipay\Model\BasketItem();
        $basketItem->setId($item['id']);
        $basketItem->setName($item['name']);
        $basketItem->setCategory1($item['category']);
        $basketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $basketItem->setPrice($item['price']);
        array_push($this->basketItems, $basketItem);
       
    }
    $this->request->setBasketItems($this->basketItems);
    return $this;
}
public function paymentForm(){
    $payment = \Iyzipay\Model\Payment::create($this->request, $this->options);
    return $payment;
}
}