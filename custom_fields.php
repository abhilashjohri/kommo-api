<?php

include_once("function.php");

$mod = (isset($_REQUEST['mod']) && $_REQUEST['mod']) ? $_REQUEST['mod'] : 'leads';

if ($mod == 'leads') {

	// Example usage of the function for GET request
	$responseGet = apiRequest('leads/custom_fields');
	$responseGet = json_decode($responseGet, true);

	echo '<pre>';print_r($responseGet);echo '</pre>';
	foreach ($responseGet['_embedded']['custom_fields'] as $field) {
	
			$extractedData[] = array(
				"field_id" => $field['id'],
				"field_name" => $field['name'],
				"field_code" => $field['code'],
				"field_type" => $field['type'],
				"values" => array(
					array(
						"value" => "test"
					)
				)
			);
		
	}
	echo '<pre>';print_r($extractedData);echo '</pre>';


}
if ($mod == 'contacts') {



	// Example usage of the function for GET request
	$responseGet = apiRequest('contacts/custom_fields');
	$responseGet = json_decode($responseGet, true);
	echo '<pre>';print_r($responseGet);echo '</pre>';

	foreach ($responseGet['_embedded']['custom_fields'] as $field) {
	//	if ($field['id'] == 1074038) {
			$extractedData[] = array(
				"field_id" => $field['id'],
				"field_name" => $field['name'],
				"field_code" => $field['code'],
				"field_type" => $field['type'],
				"values" => array(
					array(
						"value" => "test"
					)
				)
			);
		//}
	}
	echo '<pre>';print_r($extractedData);echo '</pre>';
}


if ($mod == 'tags') {



	// Example usage of the function for GET request
	$responseGet = apiRequest('tags/custom_fields');
	$responseGet = json_decode($responseGet, true);
	echo '<pre>';print_r($responseGet);echo '</pre>';

	foreach ($responseGet['_embedded']['custom_fields'] as $field) {
		//if ($field['id'] == 1074038) {
			$extractedData[] = array(
				"field_id" => $field['id'],
				"field_name" => $field['name'],
				"field_code" => $field['code'],
				"field_type" => $field['type'],
				"values" => array(
					array(
						"value" => "+91"
					)
				)
			);
		//}
	}
	echo '<pre>';print_r($extractedData);echo '</pre>';
}

if ($mod == 'companies') {



	// Example usage of the function for GET request
	$responseGet = apiRequest('companies/custom_fields');
	$responseGet = json_decode($responseGet, true);
	echo '<pre>';print_r($responseGet);echo '</pre>';

	foreach ($responseGet['_embedded']['custom_fields'] as $field) {
		//if ($field['id'] == 1074038) {
			$extractedData[] = array(
				"field_id" => $field['id'],
				"field_name" => $field['name'],
				"field_code" => $field['code'],
				"field_type" => $field['type'],
				"values" => array(
					array(
						"value" => "+91"
					)
				)
			);
		//}
	}
	echo '<pre>';print_r($extractedData);echo '</pre>';
}

?>