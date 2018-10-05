<?php
$n = intval(readline());
$cars = [];

while ($n-- > 0) {
    list($model,  $fuelAmount, $fuelCostFor1km) = explode(" ", readline());
    $car = new Car($model,  round($fuelAmount, 2), round($fuelCostFor1km, 2));
    $cars[$model] = $car;
}

$in = readline();

while($in !== "End") {
    list($command,  $carModel, $distance) = explode(" ", $in);
    echo $cars[$carModel]->drive(round($distance, 2));

    $in = readline();
}

foreach ($cars as $carModel => $carObj) {
    echo $carModel . " " . sprintf('%0.2f', $carObj->getFuelAmount()) . " " . $carObj->getDistanceTraveled() . PHP_EOL;
}


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
        $fuelNeededToTravel = $distance * $this->fuelCostForOneKilometer;
        if ($this->fuelAmount >= $fuelNeededToTravel) {
            $this->fuelAmount -= $fuelNeededToTravel;
            $this->distanceTraveled += $distance;
        } else {
            return "Insufficient fuel for the drive" . PHP_EOL;
        }
    }

}