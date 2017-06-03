<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend login asset bundle.
 */
class ChartAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
    ];
    public $js = [
        'js_chart/fusioncharts.js',      
        'js_chart/fusioncharts.widgets.js',
        'js_chart/fusioncharts.charts.js',
        'js_chart/fusioncharts.gantt.js',
    ];
   public $jsOptions = ['position' => \yii\web\View::POS_END];
}
