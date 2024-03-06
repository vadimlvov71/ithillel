<?php

interface Calculate
{
    public function getArea(int $width, int $height): string;
}

abstract class Figure implements Calculate
{
    protected int $width;
    protected int $height;

    public function __construct($width = 100, $height= 100)
    {
        $this->width = $width;
        $this->height = $height;
    }
    protected function run()
    {
        $result = $this->getArea($this->width, $this->height);
    }
    public function getArea(int $width, int $height): string
    {
        $result = $this->width;
        return (string) $result;
    }
}
class Square extends Figure
{
    public function run()
    {
        parent::run();
        $result = $this->getArea($this->width, $this->height);          
    }
    public function getArea(int $width, int $height): string
    {
        $result = $width * 2;
        return $result;
    }
}
class Rectangle extends Figure
{
    public function run()
    {
        parent::run();
        $result = $this->getArea($this->width, $this->height);      
    }
    public function getArea(int $width, int $height): string
    {
        $result = $width * $height;
        return (string) $result;
    }
}

$square = new Square(10, 0);
$square->run();


$rectangle = new Rectangle(10, 16);
$rectangle->run();


