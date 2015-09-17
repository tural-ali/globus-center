<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700',
        'plugins/lightbox/jquery.lightbox.min.css',
        'css/camera.css',
        'css/slicknav.css',
        'css/style.css',
    ];
    public $js = [
        'http://code.jquery.com/jquery-migrate-1.2.1.min.js',
        'https://maps.googleapis.com/maps/api/js?v=3.exp',
        'js/jquery.mobile.customized.min.js',
        'js/jquery.easing.1.3.js',
        'js/camera.min.js',
        'js/myscript.js',
        'plugins/lightbox/jquery.lightbox.min.js',
        'js/jquery.slicknav.js',
        'js/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'frontend\assets\FontAwesomeAsset'
    ];
}
