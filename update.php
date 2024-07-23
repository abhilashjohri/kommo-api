<?php
include_once("function.php");

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