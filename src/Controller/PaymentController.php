<?php


namespace App\Controller;


use App\Service\StripeSource;
use App\Service\TestService;
use Stripe\Stripe;
use Stripe\Source;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends AbstractController
{
    private $source;
    private $token;

    public function __construct( StripeSource $stripe)
    {
        $this->source =  $stripe->create();
    }

    public function index()
    {
       return  $this->render('index.html.twig');
    }

    private function getToken()
    {
        return $this->source->klarna->client_token;
    }

    private function getPaymentMethods()
    {
        $availablePaymentMethods = $this->source->klarna->payment_method_categories;
        $paymentMethods = $availablePaymentMethods ? explode(',', $availablePaymentMethods) : '';
        return $paymentMethods;
    }

    public function shop()
    {
        return $this->render('shop.html.twig', ['paymentMethods' => $this->getPaymentMethods()]);
    }

    public function authorize(Request $request)
    {
        $paymentType = $request->get('paymentType');
        $paymentToken = $this->getToken();

        return $this->render('authorize.html.twig', [
            'paymentType' => $paymentType,
            'paymentToken' => $paymentToken
        ]);
    }




}