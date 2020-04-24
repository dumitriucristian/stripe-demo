<?php


namespace App\Controller;


use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Stripe\Source;
use Symfony\Component\HttpFoundation\Request;
use Stripe\Charge;

class LoadController extends AbstractController
{


    public function load(Request $request)
    {
        //source id is required
        $paymentType = $request->get('paymentType');
        $sourceId = $request->get('sourceId');
        $source = $this->getSource($sourceId);
        $paymentToken = $this->getToken($source);


        return $this->render('authorize.html.twig', [
            'paymentType' => $paymentType,
            'paymentToken' => $paymentToken,
            'sourceId' => $sourceId
        ]);
    }

    private function getSource($sourceId)
    {
        Stripe::setApiKey('sk_test_GStf3NdxGG7b1UhMcJ9MKxGR00KkwThP1C');
        $source = Source::retrieve( $sourceId);

        return $source;


    }

    private function getToken($source)
    {
        Stripe::setApiKey('sk_test_GStf3NdxGG7b1UhMcJ9MKxGR00KkwThP1C');
       return $source->klarna->client_token;

    }

    public function charge(Request $request)
    {

        $sourceId = $request->get('sourceId');
        $source = $this->getSource($sourceId);
        $source_order = $source->source_order;

        $charge =Charge::create([
            'amount' => $source_order->amount,
            'currency' => $source_order->currency,
            'source' => $sourceId,
            'description' => 'My First Test Charge (created for API docs)',
        ]);

        dd($charge);


    }

}