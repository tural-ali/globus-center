<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class ContentAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/justifiedgallery/jquery.justifiedGallery.min.js',
        'js/content.js'
    ];
    public $css = [
        'plugins/justifiedgallery/justifiedGallery.min.css'
    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}