<?php 
namespace App\Libraries;
use App\Models\User;
use App\Models\BusSeatModel;

use Shopier\Enums\ProductType;
use Shopier\Enums\WebsiteIndex;
use Shopier\Exceptions\NotRendererClassException;
use Shopier\Exceptions\RendererClassNotFoundException;
use Shopier\Exceptions\RequiredParameterException;
use Shopier\Models\Address;
use Shopier\Models\Buyer;
use Shopier\Renderers\AutoSubmitFormRenderer;
use Shopier\Renderers\ButtonRenderer;
use Shopier\Renderers\IframeRenderer;
use Shopier\Renderers\ShopierButtonRenderer;
use Shopier\Shopier;


class ShopierPayment

{
    protected $shopier;
    public function __construct()
    {
       $this->shopier =new Shopier('SHOPIER_API_KEY', 'SHOPIER_API_SECRET');
    }

    public function setPayment(Array $productBuyer, Array $shippingAdress, string $productID, string $productPrice, $productName)
    {
        $buyer = new Buyer($productBuyer);
        
        // Fatura ve kargo adresi birlikte tanımlama
        // Ayrı ayrı da tanımlanabilir
        $address = new Address($shippingAdress);
        
        // shopier parametrelerini al
        $params = $this->shopier->getParams();
        
        // Geri dönüş sitesini ayarla
        $params->setWebsiteIndex(WebsiteIndex::SITE_1);
        
        // Satın alan kişi bilgisini ekle
        $params->setBuyer($buyer);
        
        // Fatura ve kargo adresini aynı şekilde ekle
        $params->setAddress($address);
        
        // Sipariş numarası ve sipariş tutarını ekle
        $params->setOrderData($productID, $productPrice);
        
        // Sipariş edilen ürünü ekle
        $params->setProductData($productName, ProductType::DOWNLOADABLE_VIRTUAL);
        return $this;
    }
    public function getPaymentButton(){
        $renderer = new ShopierButtonRenderer($this->shopier);
        $renderer
            ->setName('Shopier ile Güvenli Öde');
        
        return [
            'shopier'->$this->shopier,
            'renderer'->$renderer
        ];
    }

    public function redirectPaymentPage(){

        $renderer = new AutoSubmitFormRenderer($this->shopier);

        $this->shopier->goWith($renderer);
    }
    
}