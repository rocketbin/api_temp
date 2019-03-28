<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Driver Default
    |--------------------------------------------------------------------------
    |
    | booting up environments to use
    | can be added by adding an array of data,
    | pointing to the endpoints and setting up the default
    | to use
    | default setup: (local, dev); 
    |
    */

  'default' => [
    'driver' => 'local'
  ],


    /*
    |--------------------------------------------------------------------------
    | Driver 
    |--------------------------------------------------------------------------
    |
    | STATUS ******
    | [configurable] allows to access routes like creating the first user and configure the system core
    | [fixed] disables the configuring routes for the api
    |
    */

  'driver' => [
    'local' => [
      'hashkey' => "PC1jXASSLoOPSa#^vnGon0KG3FIxYYA2tXk8D3H@aQOMCfPaXq^<7BOX7GZ",
      'status' => 'configurable'
    ],
    'dev' => [
      'hashkey' => "PC1jXASSLoOPSa#^vnGon0KG3FIxYYA2tXk8D3H@aQOMCfPaXq^<7BOX7GZ",
      'status' => 'configurable'
    ],
    'prod' => [
      'hashkey' => "PC1jXASSLoOPSa#^vnGon0KG3FIxYYA2tXk8D3H@aQOMCfPaXq^<7BOX7GZ",
      'status' => 'configurable'
    ]
  ],


  'firstuser' => [
    'name'      => 'Nikko Mesina',
    'role_id'   => 1,
    'email'     => 'nikko@homeprezzo.com',
    'password'  => '$2y$12$9G3p50NJPGGN9nOGz/mWfuuFNqXo35azSXACRhDcQ2ctv2BuovHq2'
  ]




];
