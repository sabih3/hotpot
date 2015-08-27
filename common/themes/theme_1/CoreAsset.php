<?php
/**
* @copyright Copyright (c) 2014 icron.org
* @license http://yii2metronic.icron.org/license.html
*/
namespace common\themes\theme_1;

use yii\web\AssetBundle;
use yii\web\View;

class CoreAsset extends AssetBundle
{
public $sourcePath = '@common/themes/theme_1/assets';

	/*public $jsOptions = [
		'conditions' => [
		'global/plugins/respond.min.js' => 'if lt IE 9',
		'global/plugins/excanvas.min.js' => 'if lt IE 9',
		],
	];*/


	public $js = [
		'js/jquery.js',
		'js/bootstrap.min.js',
	];

	public $css = [
		'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
		'css/bootstrap.min.css',
		'css/style.css',
		'//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
	];


	// public $depends = [
	// 	//'icron\metronic\FontAsset',
	// 	'yii\web\YiiAsset',
 //        'yii\bootstrap\BootstrapAsset',
 //        'yii\web\JqueryAsset'
	// ];

  	public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}
