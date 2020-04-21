<?php


namespace App\Service;


use Stripe\Source;
use Stripe\Stripe;

class StripeSource
{
    private $order;

    public function __construct()
    {
        $this->order = [
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
        ];
    }

    public function create()
    {
        Stripe::setApiKey('pk_test_OMTgzDiFsMbggYdXLsLJg3vr00qoclCHNC');
        return   $source = Source::create($this->order);
    }




}