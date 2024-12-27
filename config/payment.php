<?php

return [
    'vnpay' => [
        'vnp_TmnCode' => env('VNP_TMN_CODE'),
        'vnp_HashSecret' => env('VNP_HASH_SECRET'),
        'vnp_Url' => env('VNP_URL'), 
    ],
    'momo' => [
        'momo_Url' => env('MOMO_URL'),
        'momo_PartnerCode' => env('MOMO_PARTNER_CODE'),
        'momo_AccessKey' => env('MOMO_ACCESS_KEY'),
        'momo_SecretKey' => env('MOMO_SECRET_KEY'),
        'momo_notify_url' => env('MOMO_NOTIFY_URL'),
    ],
    'zalopay' => [
        'zalopay_AppId' => env('ZALO_PAY_APP_ID'),
        'zalopay_Key1' => env('ZALO_PAY_KEY_1'),
        'zalopay_Endpoint' => env('ZALO_PAY_ENDPOINT'),
    ]
];