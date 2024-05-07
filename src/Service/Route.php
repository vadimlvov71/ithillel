<?php

namespace App\Service;
use App\Controllers\IndexController;

class Route
{
    protected $url = "";
    public function __construct($url)
    {
        $uris = ["index", "second", "third"];
        $url = $this->fixUrl($url);
       
        $page = new IndexController();
        if (in_array($url, $uris)) {
            $action = $url;
        } else {
            $action = "page404";
        }
        $page->$action();
    }
    public function fixUrl($url): string
    {
        $url = substr($url, 1);
        if($url == "") {
            $url = "index";
        }
        return $url;
    }
} 