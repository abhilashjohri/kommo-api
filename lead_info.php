<?php 

include_once("function.php");
$lead_id = (isset($_REQUEST['id']) && $_REQUEST['id']) ? $_REQUEST['id'] : '6684474';
 if($lead_id){
$response_arr = []; 
  //  contacts,catalog_elements,is_price_modified_by_robot,loss_reason,only_deleted,source_id
 $responseGetm = apiRequest2('leads/'.$lead_id.'?with=contacts')['response'];
 //$responseGet = apiRequest2('leads/'.$lead_id.'?with=');
 $response_arr['info'] = $responseGetm;

  
 // pipline info
  $pipeline_id = $responseGetm['pipeline_id'];
 $responseGet1 = apiRequest2('leads/pipelines/'.$pipeline_id.'');
  $response_arr['pipelines'] = $responseGet1['response'];

 // contact info
 $contact_arr = @$responseGetm['_embedded']['contacts'];
 if( $contact_arr ){
    foreach ($contact_arr as $key => $contact) {
        $contact_id = $contact['id'];
        $responseGet = apiRequest2('contacts/'.$contact_id.'');
        $response_arr['contacts'][$key]  =$responseGet['response'];
    }
}
 // user  info
 $responsible_user_id = $responseGetm['responsible_user_id'];
 $responseGetu = apiRequest2('users/'.$responsible_user_id.'');
 $response_arr['user'] =  $responseGetu['response'];


 echo '<pre>'; print_r($response_arr); echo '</pre>';

}else {
    
}