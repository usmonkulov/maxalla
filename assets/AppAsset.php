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
        // 'css/site.css',
        'css/main.css',
        // 'vendors/bootstrap/dist/css/bootstrap.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        'vendors/nprogress/nprogress.css',
        'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
        'build/css/custom.min.css',
        'vendors/iCheck/skins/flat/green.css',
        'form/upload.css',
    ];
    public $js = [
        // 'vendors/jquery/dist/jquery.min.js',
        'vendors/bootstrap/dist/js/bootstrap.bundle.min.js',
        'vendors/fastclick/lib/fastclick.js',
        'vendors/nprogress/nprogress.js',
        'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        'vendors/parsleyjs/dist/parsley.min.js',
        'build/js/custom.min.js',
        'vendors/iCheck/icheck.min.js',
        'vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js',
        'form/upload.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
