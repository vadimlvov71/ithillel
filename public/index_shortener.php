<?php

use App\Shortener\Service\Shortener;

require  '../vendor/autoload.php';

$url = "http://google.com";
$length = "10";
$filename = "../src/Shortener/files/urls.txt";

$app = new Shortener($length, $filename);
$result = $app->setUrl($url);

echo "<pre>";
print_r($result);
echo "</pre>";
$result_back = $app->getUrl($result["code"]);
echo "<pre>";
print_r($result_back);
echo "</pre>";