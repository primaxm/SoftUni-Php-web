<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 19.10.2018 г.
 * Time: 10:10 ч.
 */

class Vehicle
{
    private $numberDoors;
    protected $color;

    /**
     * Vehicle constructor.
     * @param $numberDoors
     * @param $color
     */
    public function __construct($numberDoors, $color)
    {
        $this->setNumberDoors($numberDoors);
        $this->setColor($color);
    }

    /**
     * @return mixed
     */
    public function getNumberDoors()
    {
        return $this->numberDoors;
    }

    /**
     * @param mixed $numberDoors
     */
    protected function setNumberDoors($numberDoors): void
    {
        $this->numberDoors = $numberDoors;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function __get($name)
    {
        if (property_exists("Vehicle", $name)) {
            return $this->$name;
        } else {
            return 'property doesn’t exist';
        }

    }

}

