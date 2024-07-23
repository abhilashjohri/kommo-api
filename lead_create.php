<?php
include_once("function.php");

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