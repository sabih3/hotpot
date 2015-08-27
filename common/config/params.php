<?php

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'fileUploadUrl' => $baseUrlUplaods,
    'uploadPath' => dirname(dirname(__DIR__)) . '/common/uploads/',
    'lunchDays' => ["0"=>"Monday", "1"=>"Tuesday", "2"=>"Wednesday", "3"=>"Thursday", "4"=>"Friday", "5"=>"Saturday", "6"=>"Sunday"],
    'dealClosingTime' => '10:30 AM',
];
