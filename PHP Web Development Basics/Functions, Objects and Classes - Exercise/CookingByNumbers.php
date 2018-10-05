<?php
$number = floatval(readline());
$operation = explode(", ", readline());

for ($i = 0; $i < 5; $i++) {
    $number = cook($number, $operation[$i]);
    echo $number . PHP_EOL;
}

function cook($number, $operation) {
    switch ($operation) {
        case "chop":
            return $number / 2;
            break;
            case "dice":
                return sqrt($number);
            break;
            case "spice":
                return $number += 1;
            break;
            case "bake":
                return $number *= 3;
            break;
            case "fillet":
                return $number -= $number*0.2;
            break;
    }
}