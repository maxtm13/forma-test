<?php

require_once 'access.php';

// $name = 'Заполнена заявка';
// $phone = '+380123456789';
// $email = 'email@gmail.com';
// $target = 'Цель';
// $company = 'Название компании';

// $custom_field_id = 454021;
// $custom_field_value = 'тест';

// $ip = '1.2.3.4';
// $domain = 'site.ua';
// $price = 0;
// $pipeline_id = 7786198;
// $user_amo = 0;

// $utm_source   = '';
// $utm_content  = '';
// $utm_medium   = '';
// $utm_campaign = '';
// $utm_term     = '';
// $utm_referrer = '';
$user = 31561882;
$domen = $_SERVER['SERVER_NAME'];
$data = [
    [
        "name" => "Форма с сайта" + $domen,
        "responsible_user_id" => $user,
        "_embedded" => [
            "metadata" => [
                "category" => "forms",
                "form_id" => 1,
                "form_name" => "Форма на сайте",
                "form_page" => "https://test.top-site.info",
                "form_sent_at" => strtotime(date("Y-m-d H:i:s")),
            ],
            "contacts" => [
                [
                    "first_name" => 'Новый контакт',
                    "custom_fields_values" => [
                        
                        [
                            "field_code" => "EMAIL",
                            "values" => [
                                [
                                    "enum_code" => "WORK", 
                                    "value" => $email
                                ]
                            ]
                        ],
                        [
                            "field_code" => "PHONE",
                            "values" => [
                                [
                                    "enum_code" => "WORK", 
                                    "value" => $phone
                                ]
                            ]
                        ]

                    ]
                ]
            ],
        ],
       
    ]
];

$method = "/api/v4/leads/complex";

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$code = (int) $code;
$errors = [
    301 => 'Moved permanently.',
    400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
    401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
    403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
    404 => 'Not found.',
    500 => 'Internal server error.',
    502 => 'Bad gateway.',
    503 => 'Service unavailable.'
];

if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );


$Response = json_decode($out, true);
// $Response = $Response['_embedded']['items'];
$output = 'ID добавленных элементов списков:' . PHP_EOL;
foreach ($Response as $v)
    if (is_array($v))
        $output .= $v['id'] . PHP_EOL;
return $output;