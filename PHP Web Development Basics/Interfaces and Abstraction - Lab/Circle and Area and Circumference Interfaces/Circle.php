<?php

class Circle implements Area, Circumference
{
    /**
     * @var float
     */
    private $radius;

    /**
     * Circle constructor.
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }


    /**
     * @return float|int
     */
    public function getSurface() {
        return pi() * pow($this->radius, 2);
    }

    /**
     * @return float|int
     */
    public function getCircumference(){
        return 2 * pi() * $this->radius;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Circle with radius = {$this->radius} mm," . PHP_EOL . "Area = {$this->getSurface()} mm" .
            PHP_EOL . "Circumference = {$this->getCircumference()} mm";
    }
}