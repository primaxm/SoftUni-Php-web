<?php
$speed = intval(readline());
$zone = readline();

$normalSpeed = getLimit($zone);

if($speed >= $normalSpeed && $speed - $normalSpeed < 20) {
    echo "speeding";
} elseif ($speed - $normalSpeed >= 20 && $speed - $normalSpeed < 40) {
    echo "excessive speeding";
} elseif ($speed - $normalSpeed >= 40) {
    echo "reckless driving";
}

function getLimit($zone) {
    $areas = ["city" => 50, "interstate" => 90, "motorway" => 130, "residential" => 20];
    if (array_key_exists($zone, $areas)) {
        return $areas[$zone];
    }
    return "Not a Valid Input!";
}
