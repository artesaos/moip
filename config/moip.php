<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Defining application environment
    |--------------------------------------------------------------------------
    |
    | Define the key and the token has been approved by MoIP
    | If true, it will use the production environment
    | If false, it will use the development environment (sandbox)
    |
    */

    'homologated' => env('MOIP_HOMOLOGATED', false),

    /*
    |--------------------------------------------------------------------------
    | Credentials
    |--------------------------------------------------------------------------
    |
    | Any request to the API must be passed two keys 
    | key and token the environment configured in "homologated"
    |
    */
    'credentials' => [
        'key' => env('MOIP_KEY', 'ABABABABABABABABABABABABABABABABABABABAB'),
        'token' => env('MOIP_TOKEN', '01010101010101010101010101010101'),
    ],
];
