<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
         'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=db_hrsmartemployee',
            'username' => 'hrsmart',
            'password' => '',
            // 'charset' => 'utf8',
            // 'enableSchemaCache' => true,

            // // Duration of schema cache.
            // 'schemaCacheDuration' => 3600,

            // // Name of the cache component used to store schema information
            // 'schemaCache' => 'cache',
            
        ],
         'db_hrsmart' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=db_hrsmart',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            // 'enableSchemaCache' => true,

            // // Duration of schema cache.
            // 'schemaCacheDuration' => 3600,

            // // Name of the cache component used to store schema information
            // 'schemaCache' => 'cache',
        ],
		 'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ]
    ],
];
