<?php
include "Vehicle.php";
include "Car.php";
include "Bicycle.php";

$myVehicle = new Vehicle(2, "orange");
echo $myVehicle->__get("numberDoors");

$myCar = new Car(4, "Red", "Audi", " A4", 2016);
$myCar->paint("green");
print_r($myCar);

$myBicycle1 = new Bicycle("blue", true, false);
$myBicycle2 = new Bicycle("blue", false, false);
$myBicycle1->ride();
$myBicycle2->stop();
print_r($myBicycle1);
print_r($myBicycle2);