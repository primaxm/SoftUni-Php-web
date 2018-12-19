<?php
include "Car.php";

list($speed, $fuel, $fuelEconomy) = explode(" ", readline());
$car = new Car();
$car->setSpeed($speed);
$car->setFuel($fuel);
$car->setFuelEconomy($fuelEconomy);

$in = readline();
while ($in !== "END") {
    if ($in === "Distance") {
        echo "Total Distance: " . sprintf('%0.1f', $car->getTotalDistance()) . PHP_EOL;
    } elseif ($in === "Time") {
        //echo $car->getTotalTravelTime() . PHP_EOL;
        echo "Total Time: " . floor($car->getTotalTravelTime() / 60) . " hours and " . $car->getTotalTravelTime() % 60 . " minutes" . PHP_EOL;
    } elseif ($in === "Fuel") {
        echo "Fuel left: " . sprintf('%0.1f', $car->getFuel()) . " liters" . PHP_EOL;
    } else {
        $command = explode(" ", $in);
        if ($command[0] === "Travel") {
            $car->travel(floatval($command[1]));
        } elseif ($command[0] === "Refuel") {
            $car->refuel(floatval($command[1]));
        }
    }

    $in = readline();
}


