<?php
$arr = array_map("floatval", explode(", ", readline()));
tripLength($arr);

function tripLength($arr) {
    $x1 = $arr[0];
    $y1 = $arr[1];
    $x2 = $arr[2];
    $y2 = $arr[3];
    $x3 = $arr[4];
    $y3 = $arr[5];

    $distanceAB = calculateDistance($x1, $y1, $x2, $y2);
    $distanceBC = calculateDistance($x2, $y2, $x3, $y3);
    $distanceAC = calculateDistance($x1, $y1, $x3, $y3);

    $d123 = $distanceAB + $distanceBC;
    $d132 = $distanceAC + $distanceBC;
    $d213 = $distanceAB + $distanceAC;
    $d231 = $distanceBC + $distanceAC;
    $d312 = $distanceAC + $distanceAB;
    $d321 = $distanceBC + $distanceAB;

    $min =  min($d123, $d132, $d213, $d231, $d312, $d321);
    if($d123 === $min) {
        echo "1->2->3: {$min}";
    } else if ($d132 == $min) {
        echo "1->3->2: {$min}";
    } else if ($d213 === $min) {
        echo "2->1->3: {$min}";
    } else if ($d231 == $min) {
        echo "2->3->1: {$min}";
    } else if ($d312 == $min) {
        echo "3->1->2: {$min}";
    } else if ($d321 == $min) {
        echo "3->2->1: {$min}";
    }
}

function calculateDistance($x1, $y1, $x2, $y2) {
    return sqrt(pow(abs($x1-$x2), 2) + pow(abs($y1-$y2), 2));
}
