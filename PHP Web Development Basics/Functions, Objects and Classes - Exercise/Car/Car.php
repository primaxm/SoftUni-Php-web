<?php

class Car {
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $totalDistance = 0;
    private $totalTravelTime = 0;

    /**
     * @return mixed
     */
    public function getTotalDistance()
    {
        return $this->totalDistance;
    }

    /**
     * @return mixed
     */
    public function getTotalTravelTime()
    {
        return $this->totalTravelTime;
    }


    /**
     * @param mixed $speed
     */
    public function setSpeed($speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @param mixed $fuel
     */
    public function setFuel($fuel): void
    {
        $this->fuel = $fuel;
    }

    /**
     * @param mixed $fuelEconomy
     */
    public function setFuelEconomy($fuelEconomy): void
    {
        $this->fuelEconomy = $fuelEconomy;
    }

    /**
     * @return mixed
     */
    public function getFuel()
    {
        return $this->fuel;
    }


    public function travel(float $distance) {
        $posibleDistance = ($this->fuel/$this->fuelEconomy) * 100;
        if ($posibleDistance > $distance) {
            $this->totalDistance += $distance;
            $this->fuel -= ($distance * $this->fuelEconomy) / 100;
            $this->totalTravelTime += ($distance / $this->speed) * 60;
        } else {
            $this->totalDistance += $posibleDistance;
            $this->fuel = 0;
            $this->totalTravelTime += ($posibleDistance / $this->speed) * 60;
        }
    }

    public function refuel($moreFuel) {
        $this->fuel += $moreFuel;
    }
}
