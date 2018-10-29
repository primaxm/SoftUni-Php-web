<?php
abstract class Vehicle {
    /**
     * @var float
     */
    protected $fuelQuantity;

    /**
     * @var float
     */
    protected $fuelConsumptionInLitersPerKm;

    /**
     * @var float
     */
    protected $drivenDistance = 0;

    /**
     * Vehicle constructor.
     * @param float $fuelQuantity
     */
    public function __construct(float $fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }


    public abstract function setfuelConsumption(float $consumtion);

    /**
     * @param float $distance
     * @throws Exception
     */
    public function drive(float $distance, string $type) {
        $posibleDistance = $this->fuelQuantity/$this->fuelConsumptionInLitersPerKm;

        if ($distance > $posibleDistance) {
            throw new Exception($type . " needs refueling");
        }
        $this->drivenDistance += $distance;
        $this->fuelQuantity -= $distance * $this->fuelConsumptionInLitersPerKm;
/*        $neededFuel = $distance * $this->fuelConsumptionInLitersPerKm;

        if ($neededFuel > $this->fuelQuantity) {
            throw new Exception($type . " needs refueling");
        }
        $this->drivenDistance += $distance;
        $this->fuelQuantity -= $neededFuel;*/
    }

    public function refueling(float $fuel) {
        $this->fuelQuantity += $fuel;
    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float
    {
        return $this->fuelQuantity;
    }


}

class Car extends Vehicle {

    /**
     * Car constructor.
     * @param float $fuelQuantity
     * @param float $consumtion
     * @throws Exception
     */
    public function __construct(float $fuelQuantity, float $consumtion)
    {
        parent::__construct($fuelQuantity);
        $this->setfuelConsumption($consumtion);
    }

    /**
     * @param float $consumtion
     */
    public function setfuelConsumption(float $consumtion) {
        $this->fuelConsumptionInLitersPerKm = $consumtion + 0.9;
    }
}

class Truck extends Vehicle {

    /**
     * Car constructor.
     * @param float $fuelQuantity
     * @param float $consumtion
     * @throws Exception
     */
    public function __construct(float $fuelQuantity, float $consumtion)
    {
        parent::__construct($fuelQuantity);
        $this->setfuelConsumption($consumtion);
    }

    public function setfuelConsumption(float $consumtion) {
        $this->fuelConsumptionInLitersPerKm = $consumtion + 1.6;
    }

    public function refueling(float $fuel) {
        $this->fuelQuantity += $fuel * 0.95;
    }

}

[$carType, $carFuelQuantity, $carLitersPerKm] = explode(" ", readline());
[$truckType, $truckFuelQuantity, $truckLitersPerKm] = explode(" ", readline());

$car = new Car($carFuelQuantity, $carLitersPerKm);
$truck = new Truck($truckFuelQuantity, $truckLitersPerKm);

$n = intval(readline());

for($a = 0; $a < $n; $a++) {
    [$command, $type, $data] = explode(" ", readline());

    if ($command == 'Drive') {
        try {
            if ($type == 'Car') {
                $car->drive($data, $type);

            } elseif ($type == 'Truck') {
                $truck->drive($data, $type);
            }
            echo $type . " travelled {$data} km" . PHP_EOL;
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }


    } elseif ($command == 'Refuel') {
        if ($type == 'Car') {
            $car->refueling($data);
        } elseif ($type == 'Truck') {
            $truck->refueling($data);
        }
    }
}

echo "Car: " . number_format(round($car->getFuelQuantity(), 2), 2, ".", "") . PHP_EOL;
echo "Truck: " . number_format(round($truck->getFuelQuantity(), 2), 2, ".", "");

