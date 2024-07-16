<?php
//YOU MPESA API KEYS
$consumerKey = "aLspkbHn3ncXTvp7Ks7Zn5QxhrWFHgfioZbRGTx8wEHorcTk"; //Fill with your app Consumer Key
$consumerSecret = "ApLe4A3dJV2OTNuzmUtnjbhq7GuCoATIF6eS1wwCRvnr40ulGm9DPEXu6k8qDjER"; //Fill with your app Consumer Secret
//ACCESS TOKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
echo $access_token = $result->access_token;
curl_close($curl);

