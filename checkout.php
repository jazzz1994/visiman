<?php

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

 require 'common/landing/bootstrap.php';
if(!isset($_POST['amount'])){
  die();
}


// if(isset($_POST['pay']) && $_POST['pay']=='pay'){
//   print_r($_POST);
// }

$amt = $_POST['amount'];
$reg_id = $_POST['reg_id'];
define('reg_id',"$reg_id");

// constant("reg_id");


$payer = new Payer();
$payer->setPaymentMethod("paypal");

$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
      ->setCurrency('INR')
      ->setQuantity(1)
      ->setSku("123123") // Similar to `item_number` in Classic API
      ->setPrice($amt);

$itemList = new ItemList();
$itemList->setItems(array($item1));

$details = new Details();
$details ->setSubtotal($amt);

$amount = new Amount();
$amount->setCurrency("INR")
       ->setTotal($amt)
       ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Total fees")
            ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL."/payStat.php?success=true&reg_id=".reg_id)
             ->setCancelUrl(SITE_URL."/payStat.php?success=false");


$payment = new Payment();
$payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

try {
  $payment->create($apiContext);
 }
catch (Exception $ex) {
  die($ex);
}

$approvalUrl = $payment->getApprovalLink();
header("location:{$approvalUrl}");
 ?>
