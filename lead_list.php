<?php

include_once("function.php");
 // Example usage of the function for GET request
 $responseGet = apiRequest('leads');
 $responseGet = json_decode($responseGet, true);
 echo '<pre>'; print_r($responseGet); echo '</pre>';