<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CDN LINK
    |--------------------------------------------------------------------------
    |
    */

    'MICROPAYMENT_ACCESSKEY' => env('MICROPAYMENT_ACCESSKEY','bd20b770ff79504f9a4b5937533c0548'),
    'MICROPAYMENT_PROJECT_IDENTIFIER' => env('MICROPAYMENT_PROJECT_IDENTIFIER','13ko-aqeqa-90a0b793'),
    'MICROPAYMENT_TESTMODE' => env('MICROPAYMENT_TESTMODE',false),
    'NOTIFICATION_TEST_MODE_ALLOWED' => env('NOTIFICATION_TEST_MODE_ALLOWED',true),
    'NOTIFICATION_CONTROLCENTER_TEST_ALLOWED' => env('NOTIFICATION_CONTROLCENTER_TEST_ALLOWED',false),
    'NOTIFICATION_CHECK_PRODUCT_AND_AMOUNT' => env('NOTIFICATION_CHECK_PRODUCT_AND_AMOUNT',false),
    'NOTIFICATION_RESULT__FORWARD' => env('NOTIFICATION_RESULT__FORWARD',1),




];
