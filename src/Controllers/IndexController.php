<?php

namespace App\Controllers;


class IndexController
{
    public function index(): void
    {
        echo "<a href='/'>index</a><br>";
        echo "<a href='second'>second</a><br>";
        echo "<a href='third'>third</a><br>";
        echo "action index";
    }
    public function second(): void
    {
        echo "<a href='/'>index</a><br>";
        echo "<a href='second'>second</a><br>";
        echo "<a href='third'>third</a><br>";
        echo "action second";
    }
    public function third(): void
    {
        echo "<a href='/'>index</a><br>";
        echo "<a href='second'>second</a><br>";
        echo "<a href='third'>third</a><br>";
        echo "action third";
    }
    public function page404(): void
    {
        echo "<a href='/'>index</a><br>";
        echo "<a href='second'>second</a><br>";
        echo "<a href='third'>third</a><br>";
        echo "page no found";
    }
} 