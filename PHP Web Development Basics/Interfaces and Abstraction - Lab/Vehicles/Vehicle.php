<?php

abstract class Vehicle
{
    /**
     * @var float
     */
    private $fuelQuantity;

    /**
     * @var float
     */
    private $litersPerKm;

    /**
     * @var float
     */
    private $drivenDistance = 0;

    /**
     * @var integer
     */
    private $tankCapacity;

    /**
     * Vehicle constructor.
     * @param float $fuelQuantity
     * @param float $litersPerKm
     */
    public function __construct(float $fuelQuantity, float $litersPerKm, int $tankCapacity)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setLitersPerKm($litersPerKm);
        $this->setTankCapacity($tankCapacity);
    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float
    {
        return $this->fuelQuantity;
    }

    /**
     * @param float $fuelQuantity
     * @throws Exception
     */
    public function setFuelQuantity(float $fuelQuantity): void
    {
        if ($fuelQuantity < 0) {
            throw new Exception("Fuel must be a positive number");
        }
        $this->fuelQuantity = $fuelQuantity;
    }

    /**
     *
     * @return float
     */
    public function getLitersPerKm(): float
    {
        return $this->litersPerKm;
    }

    /**
     * @param float $litersPerKm
     */
    public function setLitersPerKm(float $litersPerKm): void
    {
        $this->litersPerKm = $litersPerKm;
    }

    /**
     * @return float
     */
    public function getDrivenDistance(): float
    {
        return $this->drivenDistance;
    }

    /**
     * @param float $drivenDistance
     */
    public function setDrivenDistance(float $drivenDistance): void
    {
        $this->drivenDistance += $drivenDistance;
    }

    /**
     * @return int
     */
    public function getTankCapacity(): int
    {
        return $this->tankCapacity;
    }

    /**
     * @param int $tankCapacity
     */
    public function setTankCapacity(int $tankCapacity): void
    {
        $this->tankCapacity = $tankCapacity;
    }


    /**
     * @param $distance
     * @return mixed
     */
    abstract function driving($distance);

    /**
     * @param float $refuel
     * @throws Exception
     */
    public function refueling(float $refuel) {
        if ($this->fuelQuantity+$refuel > $this->tankCapacity){
            throw new Exception("Cannot fit fuel in tank");
        }
        $this->fuelQuantity += $refuel;
    }

}