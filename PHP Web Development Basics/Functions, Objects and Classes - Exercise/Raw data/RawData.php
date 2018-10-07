<?php
include "Car.php";
include "Engine.php";
include "Cargo.php";
include "Tire.php";

$number = intval(readline());

$cars = [];

for ($i = 0; $i < $number; $i++) {
    $in = explode(" ", readline());
    $model = $in[0];
    $engineSpeed = intval($in[1]);
    $enginePower = $in[2];
    $cargoWeight = intval($in[3]);
    $cargoType = $in[4];
    $tire1Pressure = floatval($in[5]);
    $tire1Age = intval($in[6]);
    $tire2Pressure = floatval($in[7]);
    $tire2Age = intval($in[8]);
    $tire3Pressure = floatval($in[9]);
    $tire3Age = intval($in[10]);
    $tire4Pressure = floatval($in[11]);
    $tire4Age = intval($in[12]);

    $engine = new Engine($engineSpeed, $enginePower);
    $cargo = new Cargo($cargoWeight, $cargoType);
    $tires = new Tire($tire1Pressure, $tire1Age, $tire2Pressure, $tire2Age,
        $tire3Pressure, $tire3Age, $tire4Pressure, $tire4Age);
    $car = new Car($model, $engine, $cargo, $tires);
    $cars[$model] = $car;
}

$commnad = readline();

if ($commnad === "fragile") {
    fragile($cars);
} elseif ($commnad === "flamable") {
    flamable($cars);
}

function fragile($cars) {
    // all cars whose Cargo Type is “fragile” with a tire whose pressure is  < 1
    foreach ($cars as $carType => $CarObj) {
        if ($CarObj->getCargo()->getCargoType() === "fragile" && ($CarObj->getTires()->getTire1Pressure() < 1 ||
                $CarObj->getTires()->getTire2Pressure() < 1 || $CarObj->getTires()->getTire3Pressure() < 1 ||
                $CarObj->getTires()->getTire4Pressure() < 1)) {
            echo $carType . PHP_EOL;
        }
    }
}

function flamable($cars) {
    //print all cars whose Cargo Type is “flamable” and have Engine Power > 250
    foreach ($cars as $carType => $CarObj) {
        if ($CarObj->getCargo()->getCargoType() === "flamable" && $CarObj->getEngine()->getEnginePower() > 250) {
            echo $carType . PHP_EOL;
        }
    }
}
