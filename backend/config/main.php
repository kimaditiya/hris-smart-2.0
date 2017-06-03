<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
         'master' => [
            'class' => 'backend\master\Master',
        ],
        'sistem' => [
            'class' => 'backend\sistem\Sistem',
        ],
        'recruitment' => [
            'class' => 'backend\recruitment\Recruitment',
        ],
        'hierarchy' => [
            'class' => 'backend\hierarchy\Hierarchy',
        ],
        'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
     'treemanager' =>  [
        'class' => '\kartik\tree\Module',
        // other module settings, refer detailed documentation
    ],
    'controllerMap' => [
            'tree' => 'arogachev\tree\controllers\TreeController',
        ],
		'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'log_id',
                    'usernameField' => 'nameEmploye',
                    'searchClass' => 'common\models\UserBackendSearch'
                ],
            ],
        ],

    ],

     'as AccessBehavior' => [
             'class' => '\common\components\AccessBehavior'
             //access before action
    ],

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\UserBackend',
            // 'loginUrl' => ['site/login'],
            // 'enableAutoLogin' => false,
            // 'enableSession' => true,
            'authTimeout'=>3600,
            //    'as loginOnce' => [  // <- bagian ini yg penting
            //     'class' => '\common\components\LoginOnce', 
            // ],
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'ambilconversi' =>[ 
                //components konversi format date
            'class'=>'common\components\SetupDateComponent', 
        ],
        'ambilprofile' =>[ 
                //components ambil profile
            'class'=>'common\components\AmbilProfileComponent', 
        ],
        'ambilmenu' =>[ 
                //components ambil menu
            'class'=>'common\components\MenuHelpers', 
        ],
        'ambilkode' =>[ 
                //components ambil kode
            'class'=>'common\components\AmbilKodeComponent', 
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-green-light',
                ],
            ],
        ],
        'session' => [
            // 'class' => 'yii\web\DbSession',
            // 'class' => 'common\classes\DbSession',
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        // 'session' => [
        //     'name' => 'advanced-backend',
        //     // 'cache' => 'mycache',
        // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
