<?php
include "Car.php";
$n = intval(readline());
$cars = [];

while ($n-- > 0) {
    list($model,  $fuelAmount, $fuelCostFor1km) = explode(" ", readline());
    $car = new Car($model,  $fuelAmount, $fuelCostFor1km);
    $cars[$model] = $car;
}

$in = readline();

while($in !== "End") {
    list($command,  $carModel, $distance) = explode(" ", $in);
    $cars[$carModel]->drive($distance);

    $in = readline();
}

foreach ($cars as $carModel => $carObj) {
    echo $carModel . " " . sprintf('%0.2f', $carObj->getFuelAmount()) . " " . $carObj->getDistanceTraveled() . PHP_EOL;
}

