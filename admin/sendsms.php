<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'phpbtes0101@gmail.com';                 // SMTP username
    $mail->Password = 'phpbtes2018';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('phpbtes0101@gmail.com', 'Mailer');
    $mail->addAddress('gopal912.singh@gmail.com', 'gopal singh');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('phpbtes0101@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
// include ('../common/admin/header.php');
//
// // sending sms s
//
//            require('../vendors/sms/textlocal.class.php');
//
//            if(isset($_GET['psid'])){
//              $psid    =  $_GET['psid'] ;
//              $res_par =  readrow('parent',array("id"=>$psid));
//            }
//            while($result = mysqli_fetch_assoc($res_par)){
//              print_r($result);
//            }
            // $textlocal = new Textlocal(false, false, '9l3pBQcnpc0-VMUe73Bm66b3fG74B3p356fE9WOjfU');
            //
            // $numbers = array(9050805203);
            // $sender = 'TXTLCL';
            // $message = 'This is a message';
            //
            // try {
            //     $result = $textlocal->sendSms($numbers, $message, $sender);
            //     print_r($result);
            // } catch (Exception $e) {
            //     die('Error: ' . $e->getMessage());
            // }

          // sending sms e
?>
