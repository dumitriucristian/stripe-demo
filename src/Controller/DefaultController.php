<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;

class DefaultController extends AbstractController
{
    private $token;
    private $paymentRequest;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->paymentRequest = $this->paymentRequest();
        $this->token = $this->getToken();
        $this->session->set('klarna-token',$this->token);
    }

    public function index()
    {
        return $this->render('index.html.twig');
    }

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

            return $data = json_decode($response->getContent());

        } catch (HttpExceptionInterface $e) {
            echo $e->getMessage();
        }
    }

    private function getToken()
    {
        return $this->paymentRequest->klarna->client_token;
    }

    public function shop()
    {
        $availablePaymentMethods = $this->paymentRequest->klarna->payment_method_categories;
        $paymentMethods = $availablePaymentMethods ? explode(',', $availablePaymentMethods) : '';

        return $this->render('shop.html.twig',
            [
                'paymentMethods' => $paymentMethods,
            ]
        );
    }

    public function authorize(Request $request)
    {
        $paymentType = $request->get('paymentType');
        return $this->render('authorize.html.twig',
            [
                'paymentType' => $paymentType,
                'paymentToken' => $this->session->get('klarna-token')
            ]
        );
    }
}

