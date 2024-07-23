<?php
include_once("function.php");

$lead_id = (isset($_REQUEST['id']) && $_REQUEST['id']) ? $_REQUEST['id'] : '6684474';

$contact_custom_filed_arr = [
    [
        "field_id" => 969622,
        "field_name" => "Position",
        "field_code" => "POSITION",
        "field_type" => "text",
        "values" => [
            [
                "value" => "Position"
            ]
        ]
    ],
    [
        "field_id" => 969624,
        "field_name" => "Phone",
        "field_code" => "PHONE",
        "field_type" => "multitext",
        "values" => [
            [
                "value" => "3323232323"
            ]
        ]
    ],
    [
        "field_id" => 969626,
        "field_name" => "Email",
        "field_code" => "EMAIL",
        "field_type" => "multitext",
        "values" => [
            [
                "value" => "test@gtest.com"
            ]
        ]
    ],
    [
        "field_id" => 1074038,
        "field_name" => "countrycode",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "IN"
            ]
        ]
    ],
    [
        "field_id" => 1074040,
        "field_name" => "tracking_clickid",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "tracking_clickid"
            ]
        ]
    ],
    [
        "field_id" => 1074042,
        "field_name" => "tracking_offerid",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "tracking_offerid"
            ]
        ]
    ],
    [
        "field_id" => 1074044,
        "field_name" => "tracking_affid",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "tracking_affid"
            ]
        ]
    ],
    [
        "field_id" => 1074046,
        "field_name" => "ip",
        "field_type" => "textarea",
        "values" => [
            [
                "value" =>  "33.33.4.4"
            ]
        ]
    ],
    [
        "field_id" => 1074048,
        "field_name" => "phoneCode",
        "field_type" => "text",
        "values" => [
            [
                "value" => "91"
            ]
        ]
    ],
    // [
    //     "field_id" => 1074050,
    //     "field_name" => "password",
    //     "field_type" => "password",
    //     "values" => [
    //         [
    //             "value" => "password"
    //         ]
    //     ]
    // ],
    [
        "field_id" => 1074052,
        "field_name" => "custom1",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "custom1"
            ]
        ]
    ],
    [
        "field_id" => 1074054,
        "field_name" => "languageCode",
        "field_type" => "text",
        "values" => [
            [
                "value" => "EN"
            ]
        ]
    ],
    [
        "field_id" => 1074056,
        "field_name" => "custom2",
  
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "custom2"
            ]
        ]
    ],
    [
        "field_id" => 1074058,
        "field_name" => "leadstatus",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "new"
            ]
        ]
    ],
    [
        "field_id" => 1074060,
        "field_name" => "brokerstatus",
        "field_code" => "",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "brokernew"
            ]
        ]
    ],
    [
        "field_id" => 1074062,
        "field_name" => "brokerresponse",
        "field_code" => "",
        "field_type" => "textarea",
        "values" => [
            [
                "value" => "resposnse"
            ]
        ]
    ],
    // [
    //     "field_id" => 1074064,
    //     "field_name" => "custom3",
    //     "field_code" => "",
    //     "field_type" => "textarea",
    //     "values" => [
    //         [
    //             "value" => "test"
    //         ]
    //     ]
    // ],
];


$company_arr =
    [
        [
            "name" => "Kommotest",
            "custom_fields_values" => [
                [
                    "field_id" => 969624,
                    "field_name" => "Phone",
                    "field_code" => "PHONE",
                    "field_type" => "multitext",
                    "values" => [
                        [
                            "value" => "+9132333233"
                        ]
                    ]
                ],
                [
                    "field_id" => 969626,
                    "field_name" => "Email",
                    "field_code" => "EMAIL",
                    "field_type" => "multitext",
                    "values" => [
                        [
                            "value" => "email@email.com"
                        ]
                    ]
                ],
                [
                    "field_id" => 969628,
                    "field_name" => "Web",
                    "field_code" => "WEB",
                    "field_type" => "url",
                    "values" => [
                        [
                            "value" => "https://www.kommo.com/"
                        ]
                    ]
                ],
                [
                    "field_id" => 969630,
                    "field_name" => "Address",
                    "field_code" => "ADDRESS",
                    "field_type" => "textarea",
                    "values" => [
                        [
                            "value" => "test"
                        ]
                    ]
                ]
            ]
        ]
    ];


$postData = [
    
        "id" => $lead_id,
        "name" => "test  mono lead edit  - " ,
        "price" => 2122121,
        "updated_by" => 11497043,
        "status_id" => 70397003,
        "pipeline_id" => 9032547,
        // "_embedded" => [
        //     "tags" => [
        //         [
        //             "id"=> 55144,
        //             "name"=> "newlead"
        //         ],
        //     ],
        //     "catalog_elements" => [],
        //     "loss_reason" => [],
        //  //   "companies" => $company_arr,
        //     "contacts" => [
        //         [
        //             "first_name" => "Adam edit",
        //             "last_name" => "Parker edit",
        //             "name" => "Adam Parker edit",
        //             "created_at" => strtotime("now"),
        //             "responsible_user_id" => 11497043,
        //             "created_by" => 11497043,
        //             "custom_fields_values" => $contact_custom_filed_arr

        //         ]
        //     ],
           
        // ],
        "updated_at" => strtotime("now"),
       // "responsible_user_id" => 11497043,
        //  "request_id"=> "1"
    
];

echo '<pre>';
print_r($postData);
echo '</pre>';

$responsePost = apiRequest2('leads/'.$lead_id, 'PATCH', $postData);

echo '<pre>';
print_r($responsePost);
echo '</pre>';