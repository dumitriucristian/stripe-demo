<?php


namespace App\Controller;


use Stripe\Stripe;
use Stripe\Source;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaymentController extends AbstractController
{


    public function index()
    {
       return  $this->render('index.html.twig');
    }


    public function shop()
    {
        Stripe::setApiKey('pk_test_OMTgzDiFsMbggYdXLsLJg3vr00qoclCHNC');
        $source = Source::create([
            "type" => "klarna",
            "currency" => "usd",
            "amount" => 10000,
            'klarna' => [
                'product' => 'payment',
                'purchase_country' => 'US',
                'custom_payment_methods' => 'payin4,installments'
            ],
            'source_order' => [
                'items' => [
                    0 => [
                        'type' => 'sku',
                        'quantity' => 1,
                        'amount' => 10000,
                        'currency' => 'usd',
                        'description' => 'Grey cotton shirt'
                    ]
                ]
            ]
        ]);
        dd($source);
        $availablePaymentMethods = $source->klarna->payment_method_categories;
        $paymentMethods = $availablePaymentMethods ? explode(',', $availablePaymentMethods) : '';

        return $this->render('shop.html.twig',
        [
            'paymentMethods' => $paymentMethods
        ]
    );
    }
}