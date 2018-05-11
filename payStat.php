<?php
require 'common/landing/bootstrap.php';
include 'db/crud_fun.php';
 use PayPal\Api\Amount;
 use PayPal\Api\Details;
 use PayPal\Api\Payment;
 use PayPal\Api\PaymentExecution;
 use PayPal\Api\Transaction;


 if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
   die();
 }

if((bool)$_GET['success']===false){
  die();
}


$reg_id=$_GET['reg_id'];
$res = readrow('student',array("reg_id"=>$reg_id));
$result = mysqli_fetch_assoc($res);

$newbfees = ($result['bfees']-($result['tfees']/4));
update('student',array('bfees'=>$newbfees),array('id'=>$result['id']));


$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$payment = Payment::get($paymentId, $apiContext);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try {
   $result = $payment->execute($execute,$apiContext );
} catch (Exception $e) {
  $data = json_decode($e->getData());
  echo $data->message;
  die();
}

echo 'payment made thanx'

 ?>
