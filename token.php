<?php
include_once("config.php");
//Getting an Access token with Refresh token via PHP

$link = 'https://' . SUB_DOMAIN . '.kommo.com/oauth2/access_token'; //Creating URL for request

/** Gathering data for request */
$data = [
	'client_id' => CLIENT_ID,
	'client_secret' => CLIENT_SECRET,
	'grant_type' => 'refresh_token',
    'refresh_token' => 'xxxxxx',
	'redirect_uri' => 'https://test.com/',
];

/**
 * We need to initiate the request to the server.
 * Let’s use the library with cURL.
 * You can also use cross-platform cURL if you don’t code on PHP.
 */
$curl = curl_init(); //Saving descriptor cURL
/** Installing required options for session cURL */
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'Kommo-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl); //Initiating request to API and saving response to variable
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
/** 
* Now we can process responses from the server. 
* It’s an example, you can process this data the way you want. 
*/ 
$code = (int)$code; 
$errors = [ 
            400 => 'Bad request', 
            401 => 'Unauthorized', 
            403 => 'Forbidden', 
            404 => 'Not found', 
            500 => 'Internal server error', 
            502 => 'Bad gateway', 
            503 => 'Service unavailable', 
          ]; 
try { /** If code of the response is not successful - return message of error */ 
      if ($code < 200 || $code > 204) 
       { throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code); } 
} 
catch(\Exception $e) { die('Error: ' . $e->getMessage() . PHP_EOL . 'Error code: ' . $e->getCode()); } 
/** 
* Data will be received in JSON, that’s why to get readable data, 
* we need to parse data that PHP will understand 
*/ 
$response = json_decode($out, true);
 
$access_token = $response['access_token']; //Access token 
$refresh_token = $response['refresh_token']; //Refresh token 
$token_type = $response['token_type']; //Type of token 
$expires_in = $response['expires_in']; //After how long does the token expire