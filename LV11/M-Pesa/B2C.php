<?php
include 'AccessToken.php';
include 'securitycredential.php';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$BusinessShortCode = "600983";
$phone = "254708374149";
$amountsend = '10';
$SecurityCredential ='TTRYjQUn6Rs6bVUXh4635JrNzKhnNwxncf1TBaJESFcrzxNF0V55ACGklfnEHn0hlLlaQkJOOw4V1nHpFLmPdPzF6hEV1ea+4nFE6ILRRxF1N2YmKSu+i9ur2d5wV7UNoTdFqYmbYdTOxPVv+NmsUCdTuvOpanHNxZHgy0JlmPKf3BCHF0fqRjN9u9aeSx5fhv3WdXnzP5sV8F+ZfS536aZEIV144kq3uSGXkXXSVSt4ooI9UDWHthf6IvnOQ/Fp6eLEoh+7zsHjWuTv3sI1z62V5JwWjwlcFYCMBye2hqWlkcB47oiGAZMEuxrfb3tVt1IEOFrRwpqkHEOkztaWXg==';
$CommandID = 'SalaryPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Umeskia Withdrawal';
$QueueTimeOutURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/b2cCallbackurl.php';
$ResultURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/dataMaxcallbackurl.php';
$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;