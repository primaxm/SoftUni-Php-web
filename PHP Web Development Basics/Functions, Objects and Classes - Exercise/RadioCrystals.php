<?php
$arr = array_map("floatval", explode(", ", readline()));
radioCrystals($arr);

function radioCrystals($arr) {
    $final = $arr[0];

    for ($i = 1; $i < count($arr); $i++) {

        $current = $arr[$i];
        $cutCount = 0;
        $lapCount = 0;
        $grindCount = 0;
        $etchCount = 0;

        if($final > $current && $final-$current > 1) break;

        echo "Processing chunk {$current} microns" . PHP_EOL;
        if($final-1 === $current) {
            $current++;
            echo "X-ray x1" . PHP_EOL;
            echo "Finished crystal {$current} microns" . PHP_EOL;
            break;
        }
        while($current / 4 >= $final) {
            $current = $current / 4;
            $cutCount++;
        }

        if($cutCount) {
            echo "Cut x{$cutCount}" . PHP_EOL;
            $current = transportAndWash($current);
        }


        while(($current - 0.2*$current) >= $final) {
            $current -= 0.2*$current;
            $lapCount++;
        }

        if($lapCount) {
            echo "Lap x{$lapCount}" . PHP_EOL;
            $current = transportAndWash($current);
        }


        while ($current - 20 >= $final) {
            $current -= 20;
            $grindCount++;
        }

        if($grindCount) {
            echo "Grind x{$grindCount}" . PHP_EOL;
            $current = transportAndWash($current);
        }


        while ($current-2 > $final) {
            $current -= 2;
            $etchCount++;
        }

        if ($current-1 === $final) {
            $current -= 2;
            $etchCount++;
            echo "Etch x{$etchCount}" . PHP_EOL;
            $current = transportAndWash($current);
            $current++;
            echo "X-ray x1" . PHP_EOL;
        } else if ($current-2 === $final) {
            $current -= 2;
            $etchCount++;
            echo "Etch x{$etchCount}" . PHP_EOL;
            $current = transportAndWash($current);
        }

        echo "Finished crystal {$current} microns" . PHP_EOL;
    }

}

function transportAndWash($current) {
    echo "Transporting and washing" . PHP_EOL;
    return floor($current);
}

