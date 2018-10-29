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
     * @throws Exception
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

class Bus extends Vehicle {

    /**
     * Bus constructor.
     * @throws Exception
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

class Car extends Vehicle
{
    /**
     * Truck constructor.
     * @throws Exception
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

class Truck extends Vehicle
{

    /**
     * Truck constructor.
     * @throws Exception
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

[$ctype, $carFuelQuantity, $carLitersPerKm, $carTankCapacity] = explode(" ", readline());
[$ttype, $tFuelQuantity, $tLitersPerKm, $truckTankCapacity] = explode(" ", readline());
[$btype, $bFuelQuantity, $bLitersPerKm, $busTankCapacity] = explode(" ", readline());

/*if (class_exists($ctype)) $car = new Car($carFuelQuantity, $carLitersPerKm, $carTankCapacity);
if (class_exists($ttype)) $truck = new Truck($tFuelQuantity, $tLitersPerKm, $truckTankCapacity);
if (class_exists($btype)) $bus = new Bus($bFuelQuantity, $bLitersPerKm, $busTankCapacity);*/
try {
    $car = new Car($carFuelQuantity, $carLitersPerKm, $carTankCapacity);
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    $truck = new Truck($tFuelQuantity, $tLitersPerKm, $truckTankCapacity);
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    $bus = new Bus($bFuelQuantity, $bLitersPerKm, $busTankCapacity);
} catch (Exception $e) {
    echo $e->getMessage();
}


$n = readline();

for ($a = 0; $a < $n; $a++) {
    [$command, $type, $num] = explode(" ", readline());
    try{
        if ($type == "Car") {
            if ($command == "Drive") {
                $car->driving($num);
                echo $type . " travelled {$num} km" . PHP_EOL;
            } elseif ($command == "Refuel") {
                $car->refueling($num);
            }
        } elseif ($type == "Truck") {
            if ($command == "Drive") {
                $truck->driving($num);
                echo $type . " travelled {$num} km" . PHP_EOL;
            } elseif ($command == "Refuel") {
                $truck->refueling($num);
            }
        } elseif ($type == "Bus") {
            if ($command == "Drive") {
                $bus->drivingWithPassengers($num);
                echo $type . " travelled {$num} km" . PHP_EOL;
            } elseif ($command == "Refuel") {
                $bus->refueling($num);
            } elseif ($command == "DriveEmpty") {
                $bus->driving($num);
            }
        }

    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}


echo "Car: " . number_format($car->getFuelQuantity(), 2, ".", "") . PHP_EOL;
echo "Truck: " . number_format($truck->getFuelQuantity(), 2, ".", "") . PHP_EOL;
echo "Bus: " . number_format($bus->getFuelQuantity(), 2, ".", "");

