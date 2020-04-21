<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;

class Payment
{
    private function paymentRequest()
    {
        $client = HttpClient::create();

        try {
            $response = $client->request('POST', 'https://api.stripe.com/v1/sources', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'auth_basic' => 'sk_test_GStf3NdxGG7b1UhMcJ9MKxGR00KkwThP1C',
                'body' => [
                    'type' => 'klarna',
                    'amount' => 10000,
                    'currency' => 'usd',
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
                ]
            ]);

            $data =  json_decode($response->getContent());
            dd('sss');
            return $data;
        } catch (HttpExceptionInterface $e) {
            echo $e->getMessage();
        }
    }
}