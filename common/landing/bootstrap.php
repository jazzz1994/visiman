<?php
// require 'vendor/autoload.php';
//
// define('SITE_URL', 'copy site url here');
// $paypal =new \PayPal\Rest\ApiContext(
//        new \PayPal\Auth\OAuthTokenCredential(
//          'AUlPBYMwQfn8Aul18re90mISjxEcIjnbvSQ_m8-scqaZ_C0UJthBkElXT1SsOFspvPMxSzB6BZajVkym',
//          'EL0P1_zzC8O1pPLHa0OogLMlv6zp2vj8GwQ9b8Zceo6gke13h4nswu7M3TFKhCtiZfD-CJf2lVNGoDCw'
//
//        )
// );
 ?>


 <?php
// if(!isset($_POST['fees'])){
//   die();
// }


// $payer

  ?>


  <?php
  // 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
  // Used for composer based installation
  require 'vendor/autoload.php';
  // Use below for direct download installation
  // require __DIR__  . '/PayPal-PHP-SDK/autoload.php';

   define('SITE_URL','http://localhost/visitormnt');

  $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AUlPBYMwQfn8Aul18re90mISjxEcIjnbvSQ_m8-scqaZ_C0UJthBkElXT1SsOFspvPMxSzB6BZajVkym',     // ClientID
            'EL0P1_zzC8O1pPLHa0OogLMlv6zp2vj8GwQ9b8Zceo6gke13h4nswu7M3TFKhCtiZfD-CJf2lVNGoDCw'      // ClientSecret
        )
);


// $apiContext->setConfig(
//       array(
//         'log.LogEnabled' => true,
//         'log.FileName' => 'PayPal.log',
//         'log.LogLevel' => 'DEBUG'
//       )
// );
//
//
//
// $payer = new \PayPal\Api\Payer();
// $payer->setPaymentMethod('paypal');
//
// $amount = new \PayPal\Api\Amount();
// $amount->setTotal('1.00');
// $amount->setCurrency('USD');
//
// $transaction = new \PayPal\Api\Transaction();
// $transaction->setAmount($amount);
//
// $redirectUrls = new \PayPal\Api\RedirectUrls();
// $redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
//     ->setCancelUrl("https://example.com/your_cancel_url.html");
//
// $payment = new \PayPal\Api\Payment();
// $payment->setIntent('sale')
//     ->setPayer($payer)
//     ->setTransactions(array($transaction))
//     ->setRedirectUrls($redirectUrls);
//
//
//
//     try {
//     $payment->create($apiContext);
//     echo $payment;
//
//     echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
// }
// catch (\PayPal\Exception\PayPalConnectionException $ex) {
//     // This will print the detailed information on the exception.
//     //REALLY HELPFUL FOR DEBUGGING
//     echo $ex->getData();
// }
//

?>
