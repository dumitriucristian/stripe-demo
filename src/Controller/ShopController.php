<?php


namespace App\Controller;


use App\Service\StripeSource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController
{

    private $source;
    private $token;

    public function __construct( StripeSource $stripe)
    {
        $this->source =  $stripe->create();
        $this->token = $this->getToken();
        $this->sourceId = $this->getSourceId();
    }

    private function getToken()
    {
        return $this->source->klarna->client_token;
    }

    private function getSourceId()
    {
        return $this->source->id;
    }

    private function getPaymentMethods()
    {
        $availablePaymentMethods = $this->source->klarna->payment_method_categories;
        $paymentMethods = $availablePaymentMethods ? explode(',', $availablePaymentMethods) : '';
        return $paymentMethods;
    }

    public function shop()
    {
        return $this->render('shop.html.twig', [
            'paymentMethods' => $this->getPaymentMethods(),
            'sourceId' => $this->getSourceId()
            ]);
    }

}