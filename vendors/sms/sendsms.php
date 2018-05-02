<?php // sending sms s


            $textlocal = new Textlocal(false, false, '9l3pBQcnpc0-VMUe73Bm66b3fG74B3p356fE9WOjfU');

            $numbers = array(9050805203);
            $sender = 'TXTLCL';
            $message = 'This is a message';

            try {
                $result = $textlocal->sendSms($numbers, $message, $sender);
                print_r($result);
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }

// sending sms e
?>
