<?php

class Car
{   private $model;

    /**
     * @return mixed
     */
    public function getFuelAmount()
    {
        return $this->fuelAmount;
    }

    /**
     * @return int
     */
    public function getDistanceTraveled(): int
    {
        return $this->distanceTraveled;
    }
    private $fuelAmount;
    private $fuelCostForOneKilometer;
    private $distanceTraveled;

    /**
     * Car constructor.
     * @param $model
     * @param $fuelAmount
     * @param $fuelCostForOneKilometer
     * @param $distanceTraveled
     */
    public function __construct($model, $fuelAmount, $fuelCostForOneKilometer, $distanceTraveled = 0)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostForOneKilometer = $fuelCostForOneKilometer;
        $this->distanceTraveled = $distanceTraveled;
    }

    public function drive($distance) {
        $fuelNeededToTravel = round($distance * $this->fuelCostForOneKilometer, 2);
        if ($this->fuelAmount >= $fuelNeededToTravel) {
            $this->fuelAmount -= $fuelNeededToTravel;
            $this->distanceTraveled += $distance;
        } else {
            echo "Insufficient fuel for the drive" . PHP_EOL;
        }
    }

}