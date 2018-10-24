<?php
spl_autoload_register();
[$ctype, $carFuelQuantity, $carLitersPerKm, $carTankCapacity] = explode(" ", readline());
[$ttype, $tFuelQuantity, $tLitersPerKm, $truckTankCapacity] = explode(" ", readline());
[$btype, $bFuelQuantity, $bLitersPerKm, $busTankCapacity] = explode(" ", readline());

if (class_exists($ctype)) $car = new Car($carFuelQuantity, $carLitersPerKm, $carTankCapacity);
if (class_exists($ttype)) $truck = new Truck($tFuelQuantity, $tLitersPerKm, $truckTankCapacity);
if (class_exists($ttype)) $bus = new Bus($bFuelQuantity, $bLitersPerKm, $busTankCapacity);


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


echo "Car: " . number_format($car->getFuelQuantity(), 2) . PHP_EOL;
echo "Truck: " . number_format($truck->getFuelQuantity(), 2) . PHP_EOL;
echo "Bus: " . number_format($bus->getFuelQuantity(), 2);

