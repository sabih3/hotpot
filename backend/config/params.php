<?php
use \yii\web\Request;
use Yii;
$baseUrlUplaods = str_replace('/backend/web', '', (new Request)->getBaseUrl());

return [
    'adminEmail' => 'admin@example.com',
   	'fileUploadUrl' => $baseUrlUplaods.'/common',
    'uploadPath' => dirname(dirname(__DIR__)) . '/common/uploads/',
];
