<?php

class Bus extends Vehicle {

    /**
     * Bus constructor.
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
        $usedFuel = $distance * $this->getLitersPerKm();
        $this->drivingResult($distance, $usedFuel);
    }

    /**
     * @param $distance
     * @throws Exception
     */
    public function drivingWithPassengers($distance) {
        $usedFuel = $distance * ($this->getLitersPerKm() + 1.4);
        $this->drivingResult($distance, $usedFuel);
    }

    /**
     * @param $usedFuel
     * @throws Exception
     */
    public function drivingResult($distance, $usedFuel) {
        if ($usedFuel > $this->getFuelQuantity()) {
            throw new Exception("Bus needs refueling");
        } else {
            $fuelRemain = $this->getFuelQuantity() - $usedFuel;
            $this->setFuelQuantity($fuelRemain);
            $this->setDrivenDistance($distance);
        }
    }

}