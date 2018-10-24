<?php

class Truck extends Vehicle
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
        $usedFuel = $distance * ($this->getLitersPerKm() + 1.6);

        if ($usedFuel > $this->getFuelQuantity()) {
            throw new Exception("Truck needs refueling");
        } else {
            $fuelRemain = $this->getFuelQuantity() - $usedFuel;
            $this->setFuelQuantity($fuelRemain);
            $this->setDrivenDistance($distance);
        }

    }

    /**
     * @param float $refuel
     * @throws Exception
     */
    public function refueling(float $refuel) {
        $addFuel = $this->getFuelQuantity() + $refuel * 0.95;
        $this->setFuelQuantity($addFuel);
    }

}