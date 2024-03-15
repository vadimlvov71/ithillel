<?php

use App\Shortener\Service\Shortener;
//echo "aaaa: " . __DIR__;
//exit;
require  './vendor/autoload.php';

$url = "http://google.com";
$length = "10";
$filename = "./src/Shortener/files/urls.txt";

$app = new Shortener($length, $filename);
$result = $app->setUrl($url);


print_r($result);
$result_back = $app->getUrl($result["code"]);
print_r($result_back);
//$url = "http://google";
//$result = $app->setUrl($url);