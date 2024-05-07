<?php

use App\Service\Route;

require  '../vendor/autoload.php';

$route = new Route($_SERVER['REQUEST_URI']);