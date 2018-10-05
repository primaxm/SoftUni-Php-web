<?php
$input = explode(" ", readline());
for($i = 0; $i < count($input); $i += 3) {
    echo isVolume($input[$i], $input[$i+1], $input[$i+2]) ? "inside" : "outside";
    echo  PHP_EOL;
}


function isVolume($x, $y, $z) {
    $x1 = 10; $x2 = 50;
    $y1 = 20; $y2 = 80;
    $z1 = 15; $z2 = 50;

    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }
    return false;
}