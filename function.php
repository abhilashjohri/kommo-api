<?php 
include_once("config.php");
$curl = curl_init();
function apiRequest($endpoint, $method = 'GET', $data = null) {
  $url = 'https://' . SUB_DOMAIN . '.kommo.com/api/v4/' . $endpoint; // Creation of URL for request
  $access_token = CLIENT_ACCESS_TOKEN; // Getting access_token from your storage
  
  // Creating headers
  $headers = [
      'Authorization: Bearer ' . $access_token,
      'Content-Type: application/json'
  ];
  
  // Initializing cURL session
  $curl = curl_init();
  
  // Setting required options for cURL session
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Kommo-oAuth-client/1.0');
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

  if ($method == 'POST') {
      curl_setopt($curl, CURLOPT_POST, true);
      if ($data) {
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
      }
  }

  // Executing request to API and saving response to variable
  $out = curl_exec($curl);
  $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
  
  // Handling errors
  $errors = [
      400 => 'Bad request',
      401 => 'Unauthorized',
      403 => 'Forbidden',
      404 => 'Not found',
      500 => 'Internal server error',
      502 => 'Bad gateway',
      503 => 'Service unavailable',
  ];
  
  try {
      // If the response code is not successful - return message of error
      if ($code < 200 || $code > 204) {
          throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
      }
  } catch(Exception $e) {
      die('Error: ' . $e->getMessage() . PHP_EOL . 'Error code: ' . $e->getCode());
  }
  
  // Decoding the JSON response
      return $out ;
//return json_decode($out, true);
}
function apiRequest2($endpoint, $method = 'GET', $data = null) {
  $url = 'https://' . SUB_DOMAIN . '.kommo.com/api/v4/' . $endpoint; // URL for the API request
  $access_token = CLIENT_ACCESS_TOKEN; // Access token from your storage

  // Headers for the API request
  $headers = [
      'Authorization: Bearer ' . $access_token,
      'Content-Type: application/json'
  ];

  // Initialize cURL session
  $curl = curl_init();

  // Set cURL options
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Kommo-oAuth-client/1.0');
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

  if ($method == 'POST') {
    curl_setopt($curl, CURLOPT_POST, true);
    if ($data) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }
} elseif ($method == 'PATCH') {
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
    if ($data) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }
}
  // Execute the API request and capture the response
  $response = curl_exec($curl);
  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

  // Handle cURL errors
  if (curl_errno($curl)) {
      $error_msg = curl_error($curl);
      curl_close($curl);
      return [
          'success' => false,
          'error' => 'cURL Error: ' . $error_msg
      ];
  }

  curl_close($curl);

  // Handle HTTP errors
  if ($httpCode < 200 || $httpCode >= 300) {
      $error_message = 'HTTP Error: ' . $httpCode;
      if ($response) {
          $error_response = json_decode($response, true);
          if (isset($error_response['message'])) {
              $error_message = $error_response['message'];
          }
      }
      return [
          'success' => false,
          'error' => $error_message,
          'http_code' => $httpCode
      ];
  }

  // Successful response
  return [
      'success' => true,
      'response' => json_decode($response, true)
  ];
}



function getUserIP() {
  // Check for shared internet/ISP IP address
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  // Check for IPs passing through proxies
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  // Check for the remote address
  else {
      $ip = $_SERVER['REMOTE_ADDR'];
  }

  return $ip;
}

?>