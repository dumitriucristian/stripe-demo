# stripe-demo

## A small demo stripe klarna app that use Symfony with phpfmp server.

### How it works
 We need three distinct components. *The klarna widget*, *the stripe source*, and the stripe *source object*.

 #### The klarna widget
  The klarna widget has only two purposes:
  To Generates the form through the load method and Authorize the payment. 
  The klarna widget is just a small peace of javascript code that will generate the form and will guide the user
  through the payment flow. When the user interact with the form, the klarna widget will trigger an event that will
  notify klarna that a change has been made in the payment process.
  
  #### The stripe source
  The stripe source is just a stripe api that can create or update the payment. We can make different requests to the 
  stripe source that will change the payment flow. This way we can update, refund or cancel a payment, almost, in any
  moment. On each interaction with the stripe api a stripe object is returned. 

  #### The stripe object
  The stripe object is an object that is holding all the payment informations. Everithing. The state of the payment, 
  the user data, the order data the shipment, payment methods available and so forth. 

  #### The payment flow:
  ##### Scenario
   The payment flow can be different depending on the implementation but in this scenario we will give the user two 
   payment options. 
   To pay later or to slice in four.
   We have an anonymous user from US, that is in the checkout page. 
  ###### Create the stripe source    
   We take the cart content, the order, and make a request to the stripe source to create a new stripe object 
   that will contain the cart order for the client in X country and optional, what payment we wold like to offer.     
   The source object, that we will receive from the source api, as an answer to our request, will tell us what payment
   methods are available for that order in that country and we can load the form.
   
   Side note: Shipping information
   If selling a physical product that must be shipped, shipping information is required. If not provided during creation,        shipping information should be provided in a source update.

   ##### Create the klarna widget and load the payment form
   Having multiple payment methods available, we can ask the user to choose how he will like to pay.
   We take the user answer, and assuming is slice in four, we request the klarna widget to generate and load the form
   for slice in four.
   Depending on the payment method, the form will be different, with different fields and different validation rules. 
   
   
   #### Authorization klarna will send the data to stripe, and stripe will update the source object, 
   When the user interact with the form the request will be sent to klarna that will check the validity of the request 
   and will authorize the payment returning an authorization id.
   
 
   
   

  
### Requirements
  - docker  
  - composer
 
### Install
  1. download or clone 
  2. in the root folder run docker-compose build
  3. use composer install 
  4. access http://localhost:8080

### Files:  
  For testing in postman import json file:  
  Klarna-SLICE.postman_collection.json

Stripe Documentation available here: https://stripe.com/docs/sources/klarna

There are two different implementations:
 Branch master has the most simple implementation and a second a little bit more complex called service-test. Switch branch to test both of them.

Stripe documentation for source here: https://stripe.com/docs/sources/klarna

### Steps:
#### Create a stripe source 
 Stripe documentation for create source api here: https://stripe.com/docs/api/sources/create
   Data required: 
      Payment type as type = “klarna” 
      amount, 
      currency, 
      order deatils as source_order[items][item_detail(type quantity amount currency description)] 
   Data returned: 
     Source object: 
       source id as id,  
       klarna token as klarna_token, 
       klarna payment methods available as payment_method_categories,
       the order details as source_order 

 #### Create a klarna widget to load and authorize the payment. 
 Klarna documentation here: https://developers.klarna.com/documentation/klarna-payments/single-call-descriptions/load-klarna-payments/

*Load* the widget on the page and authorize the payment. 
*Update* the source object with the delivery or invoice data and make an update requeste to the stripe source. 
*Charge* create a stripe charge 
Charge details here: https://stripe.com/docs/api/charges/create 

Create a source object making a request to: https://api.stripe.com/v1/sources. This requires a source_order object. If the source_order is missing than payin4 payment will not be available. 
The request-response will provide a source object that will have the klarna token required in the second step. The authorization of the payment. 

Create a Charge to charge the payment if the authorize token is received from the klarna widget.

Charge request need the source id and the source order

If the charge is successful it will generate a charge id that can be used for a refund if required.

A simpler working demo can be found on github here: https://github.com/dumitriucristian/stripe-demo 
 
This is WIP and new branch with different implementation will be added.
