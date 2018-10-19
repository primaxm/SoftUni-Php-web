<?php

class Car extends Vehicle
{
    private $brand;
    private $model;
    private $year;

    /**
     * Car constructor.
     * @param $brand
     * @param $model
     * @param $year
     */
    public function __construct($numberDoors, $color, $brand, $model, $year)
    {
        parent::__construct($numberDoors, $color);
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function paint($paint_color) {
        //parent::setColor($paint_color);
        $this->color = $paint_color;
    }

}