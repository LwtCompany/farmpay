<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'site/css/style.css',
        'site/css/responsive.css'


    ];
    public $js = [
        'site/js/jquery/jquery-3.3.1.min.js',
        'site/js/bootstrap/popper.min.js',
        'site/js/bootstrap/bootstrap.min.js',
        'site/js/plugins/plugins.min.js',
        'site/js/active.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
