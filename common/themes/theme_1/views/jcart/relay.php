<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file takes input from Ajax requests and passes data to jcart.php
// Returns updated cart HTML back to submitting page

header('Content-type: text/html; charset=utf-8');


// Include jcart before session start
include_once('/var/www/html/foodmaidan/common/themes/theme_1/views/jcart/jcart.php');

// Process input and return updated cart HTML
$jcart->display_cart();

?>