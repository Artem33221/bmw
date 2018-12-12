<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/bmw/web/css/site.css',
        '/bmw/web/css/animate.css',
        '/bmw/web/css/bootstrap.min.css',
        '/bmw/web/css/font-awesome.min.css',
        '/bmw/web/css/magnific-popup.css',
        '/bmw/web/css/owl.carousel.css'
    ];
    public $js = [
        'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
         '/bmw/web/js/jquery-3.2.1.min.js',
         '/bmw/web/js/bootstrap.min.js',
        // '/bmw/web/assets/js/magnific-popup.min.js',
         '/bmw/web/js/home.js',
        // '/bmw/web/assets/js/map.js',
        // '/bmw/web/assets/js/map2.js',
        // '/bmw/web/assets/js/masonry.pkgd.min.js',
        // '/bmw/web/assets/js/owl.carousel.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
