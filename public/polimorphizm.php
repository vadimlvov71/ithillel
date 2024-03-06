<?php

interface Calculate
{
    public function getArea(array $sides): string;
}

abstract class Figure implements Calculate
{
   
    protected function run()
    {
        echo 'Parent' . PHP_EOL;
        $sides = [];
        $sides[] = 1000;
        $sides[] = 1000;
        $result = $this->getArea($sides);
        echo 'Parent result: ' . $result . PHP_EOL;
    }
    public function getArea(array $sides): string
    {
        $result = $sides[0];
        return (string) $result;
    }
}
class Square extends Figure
{
    public function run()
    {
        parent::run();
        $sides = [];
        $sides[] = 10;
        $result = $this->getArea($sides);
        
        echo 'Square result: ' . $result . PHP_EOL;        
    }
    public function getArea(array $sides): string
    {
        $result = $sides[0] * 2;
        return $result;
    }
}
class Rectangle extends Figure
{
    public function run()
    {
        parent::run();
        $sides = [];
        $sides[] = 10;
        $sides[] = 16;
        $result = $this->getArea($sides);
        echo 'Rectangle result: ' . $result . PHP_EOL;        
    }
    public function getArea(array $sides): string
    {
        $result = $sides[0] * $sides[1];
        return (string) $result;
    }
}
$square = new Square();
$square->run();

$rectangle = new Rectangle();
$rectangle->run();


