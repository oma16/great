<?php session_start();


    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = 2000; //Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-38623cbb6d1067c7f029bc86a714aee3-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify ');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency']$customerName = $resp['data']['customerName ']
        $customerEmail = $resp['data']['customerEmail']
        $paymentOption = $resp['data']['paymentOption']
        $paymentRef = $resp['data']['txref']

        $payment_time = time("h:i:sa")
        $payment_date = date("Y:m:d")

        $paymentdetails = [

          'customerName' ->  $customerName,
          'status' ->  $paymentStatus,
          'created' ->  $payment_date. "". $payment_time,
          'customerEmail' ->  $customerEmail,
          'amount' ->  $chargeAmount,
          'paymentOption' ->  $paymentOption,
          'paymentref' ->  $paymentRef,
          'currency' ->  $chargeCurrency,
        ];
        
if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
          //Give Value and return to Success page
            $subject = "successful Payment";
            $message = "A payment has been made from your account,if you did not initiate this reset, please ignore this message,
            otherwise, visit localhost/great/dashboard.php?token=".$token;
        $headers = "From: no-reply@snh.org" . "\r\n" .
    "CC: mariam@snh.org";
    file_put_contents("db/payment/". $email . ". json",json_encode($paymentdetails));
    $try = mail($email,$subject,$message,$headers); 
    if($try){
      $_SESSION["error"] = "payment successful : ". $email;
      header('location:dashboard.php');
die();
        } else {
            //Dont Give Value and return to Failure page
        }
    }

?>
