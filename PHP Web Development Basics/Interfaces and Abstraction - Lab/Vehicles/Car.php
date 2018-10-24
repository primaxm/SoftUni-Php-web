<?php

class Car extends Vehicle
{
    /**
     * Truck constructor.
     */
    public function __construct(float $quantity, float $litesrPerKm, int $tankCapacity)
    {
        parent::__construct($quantity, $litesrPerKm, $tankCapacity);
    }

    /**
     * @param $distance
     * @throws Exception
     */
    public function driving($distance) {
        $usedFuel = $distance * ($this->getLitersPerKm() + 0.9);

        if ($usedFuel > $this->getFuelQuantity()) {
            throw new Exception("Car needs refueling");
        } else {
            $fuelRemain = $this->getFuelQuantity() - $usedFuel;
            $this->setFuelQuantity($fuelRemain);
            $this->setDrivenDistance($distance);
        }
    }

}