<?php
include_once("function.php");

$module =$_REQUEST['module'];
 
 if($module =="lead_list"){
    // Example usage of the function for GET request
    $responseGet = apiRequest('leads');
    $responseGet = json_decode($responseGet, true);
    echo '<pre>'; print_r($responseGet); echo '</pre>';
 }

 if($module =="lead_create"){
/** Gathering data for request */
$postData = [
    [
            "name"=> "Example Lead 2",
            "created_by"=> 11497043,
            "price"=> 20000,
            "status_id"=> 70397003,
            "pipeline_id"=> 9032547 ,
            "custom_fields_values"=> [
                [ 
                    "field_id"=> 698638, // Work phone
                    "values"=> [
                        [
                            "value"=> '9874563210'
                            ]
                    ]
                        ],
                        [ 
                            "field_id"=> 698650, // Work email
                            "values"=> [
                                [
                                    "value"=> 'abhilashjohri@gmail.com'
                                    ]
                            ]
                                ],
                                [ 
                                    "field_id"=> 1074038, // Work countrycode
                                    "values"=> [
                                        [
                                            "value"=> 'IN'
                                            ]
                                    ]
                                        ]
                                       
                        
            ]
    ],
       
    ];

    $postData = [
        [
                "name"=> "test Lead 12",
                "created_by"=> 11497043,
                "price"=> 20000,
                "status_id"=> 70397003,
                "pipeline_id"=> 9032547 ,
               
            ],  
        ];
$responsePost = apiRequest('leads', 'POST', $postData);
$responsePost = json_decode($responsePost, true);
echo '<pre>'; print_r($responsePost); echo '</pre>';
 }
 if($module =="lead_complex"){

    $postData = [
        [
            "name"=> "test 1 mono lead - ".strtotime("now"),
            "price"=> 2222,
            "created_by"=> 11497043,
            "status_id"=> 70397003,
            "pipeline_id"=> 9032547 ,
            "_embedded"=>[

                "tags"=> [],
               "contacts"=>[
                  [
                     "first_name"=>"Adam",
                     "last_name"=> "Parker",
                     "name"=> "Jane Doe",
                     "created_at"=>strtotime("now"),
                     "responsible_user_id"=>11497043,
                     "created_by"=>11497043,
                     "custom_fields_values"=> [
                        [
                            "field_code"=> "PHONE",
                            "values"=> [
                                [
                                    "value"=> "+18305803077",
                                    "enum_code"=> "WORK"
                                    ]

                            ]
                                ],
                                [
                                    "field_code"=> "EMAIL",
                                    "values"=> [
                                        [
                                            "value"=> "abhilash@mono.com",
                                            "enum_code"=> "WORK"
                                            ]
        
                                    ]
                             ]

                    ]

                  ]
               ],
               "companies"=>[
                  [
                     "name"=>"Kommo"
                  ]
               ]
                  ],
            "created_at"=>strtotime("now"),
            "responsible_user_id"=>11497043,
          //  "request_id"=> "1"
         ]
        ];


        $responsePost = apiRequest('leads/complex', 'POST', $postData);
        $responsePost = json_decode($responsePost, true);
        echo '<pre>'; print_r($responsePost); echo '</pre>';
 }
?>