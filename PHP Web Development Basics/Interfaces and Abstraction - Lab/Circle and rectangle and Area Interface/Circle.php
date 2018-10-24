<?php

class Circle implements Area
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
     * @return string
     */
    public function __toString()
    {
        return "Circle, radius = {$this->radius} mm, area = {$this->getSurface()} mm";
    }
}