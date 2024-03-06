<?php

interface Calculate
{
    /**
     * @param int $width
     * @param int $height
     * 
     * @return string
     */
    public function getArea(int $width, int $height): string;
}

abstract class Figure implements Calculate
{
    protected int $width;
    protected int $height;

    /**
     * @param int $width
     * @param int int
     */
    public function __construct(int $width = 0, int $height= 0)
    {
        $this->width = $width;
        $this->height = $height;
    }
    /**
     * @return void
     */
    protected function run(): void
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
    public function run(): void
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
    /**
     * @return void
     */
    public function run(): void
    {
        parent::run();
        $result = $this->getArea($this->width, $this->height);      
    }
    public function getArea(int $width, int $height): string
    {
        $result = $width * $height;
        return $result;
    }
}

$square = new Square(10, 0);
$square->run();


$rectangle = new Rectangle(10, 16);
$rectangle->run();


