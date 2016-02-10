<?php

return [
    'db' => [
        'driver' => 'Pdo_Mysql',
        'host' => 'localhost',
        'database' => 'addressbook',
        'username' => 'root',
        'password' => '',
        'charset' => 'UTF8'
    ],
    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => Zend\Db\Adapter\AdapterServiceFactory::class
        ]
    ]
];
