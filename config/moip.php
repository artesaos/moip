<?php 

return [

	/*
	|--------------------------------------------------------------------------
	| Defining application environment
	|--------------------------------------------------------------------------
	|
	| Define the key and the token has been approved by MoIP
	| If true, it will use the ambiende production
	| If false, it will use the development environment (sandbox)
	|
	*/

	'approved' => env('MOIP_HOMOLOGATED'),

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
		'key' 	=> env('MOIP_KEY'),
		'token'	=> env('MOIP_TOKEN')
	],
];