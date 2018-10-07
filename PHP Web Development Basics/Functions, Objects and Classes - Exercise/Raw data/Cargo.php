<?php

class Cargo
{
    private $cargoWeight;
    private $cargoType;

    /**
     * Cargo constructor.
     * @param $cargoWeight
     * @param $cargoType
     */
    public function __construct($cargoWeight, $cargoType)
    {
        $this->cargoWeight = $cargoWeight;
        $this->cargoType = $cargoType;
    }

    /**
     * @return mixed
     */
    public function getCargoType()
    {
        return $this->cargoType;
    }

}