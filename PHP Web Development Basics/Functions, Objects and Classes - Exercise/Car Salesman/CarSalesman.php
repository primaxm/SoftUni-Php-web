<?php
include "Car.php";
include "Engine.php";
$numEngines = intval(readline());
$engines = [];
$cars = [];

for ($i=0; $i < $numEngines; $i++) {
    $input = explode(" ", readline());
    $model = $input[0];
    $power = $input[1];
    $displacement = "n/a";
    $efficiency = "n/a";

    if (array_key_exists(2, $input)) {
        if (is_numeric($input[2])) {
            $displacement = $input[2];
        } else {
            $efficiency = $input[2];
        }
    }
    if (array_key_exists(3, $input)) $efficiency = $input[3];

    $engine = new Engine($model, $power, $displacement, $efficiency);
    $engines[$model] = $engine;
}

$numCars = intval(readline());

for ($i=0; $i < $numCars; $i++) {
    $input = explode(" ", readline());
    $model = $input[0];
    $engine = $engines[$input[1]];
    $weight = "n/a";
    $color = "n/a";

    if (array_key_exists(2, $input)) {
        if(is_numeric($input[2])) {
            $weight = $input[2];
        } else {
            $color = $input[2];
        }
    }
    if (array_key_exists(3, $input)) {
        $color = $input[3];
    }

    $car = new Car($model, $engine, $weight, $color);
    $cars[$model] = $car;
}


foreach ($cars as $val) {
    $eng = $val->getEngine();
    echo "{$val->getModel()}:" . PHP_EOL;
    echo "  {$eng->getModel()}:" . PHP_EOL;
    echo "    Power: {$eng->getPower()}" . PHP_EOL;
    echo "    Displacement: {$eng->getDisplacement()}" . PHP_EOL;
    echo "    Efficiency: {$eng->getEfficiency()}" . PHP_EOL;
    echo "  Weight: {$val->getWeight()}" . PHP_EOL;
    echo "  Color: {$val->getColor()}" . PHP_EOL;
}
