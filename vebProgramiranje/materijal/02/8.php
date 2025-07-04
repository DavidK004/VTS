<?php

class Shape4
{
    public bool $hasSides = true;
    public string $producer;

    public function __construct()
    {
        $this->producer = "VTS";
    }

    public function getDetails():string
    {
        return "<br>Name of our producer is " . $this->producer;
    }

}

class Square4 extends Shape4
{
    public string $name = "square";
    protected string $color;

    public function __construct(string $color)
    {
        $this->color = $color;
        // parent::__construct(); // try to put in comment
    }

    public function greet():string
    {
        $text = parent::getDetails();
        //$text = $this->getDetails();
        return "<p>" . $this->hasSides . " " . $this->producer . " " . $text . "</p>";
    }

    public function getDetails():string
    {
        return "<br>Our name is " . $this->name;
    }

    public function getColor():string
    {
        return $this->color;
    }

}

$shape = new Shape;
var_dump($shape);
$square = new Square("blue");
var_dump($square);
echo $shape->getDetails();
echo $square->getDetails();
echo $square->getColor();
echo $square->greet();
