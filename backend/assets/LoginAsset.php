<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend login asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
    ];
    public $js = [
        'js/bootstrap-show-password.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
