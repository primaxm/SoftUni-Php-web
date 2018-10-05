<?php
$input = array_map("floatval", explode(", ", readline()));

for ($i = 0; $i < count($input); $i+=2) {
    $tresureX = $input[$i];
    $tresureY = $input[$i+1];
    searchTresure($tresureX, $tresureY);
}

function searchTresure($tresureX, $tresureY) {
    if (($tresureX >= 8 && $tresureX <= 9) && ($tresureY >= 0 && $tresureY <= 1)) {
        echo "Tokelau".PHP_EOL;
    } elseif (($tresureX >= 1 && $tresureX <= 3) && ($tresureY >= 1 && $tresureY <= 3)) {
        echo "Tuvalu".PHP_EOL;
    } elseif (($tresureX >= 5 && $tresureX <= 7) && ($tresureY >= 3 && $tresureY <= 6)) {
        echo "Samoa".PHP_EOL;
    } elseif (($tresureX >= 0 && $tresureX <= 2) && ($tresureY >= 6 && $tresureY <= 8)) {
        echo "Tonga".PHP_EOL;
    } elseif (($tresureX >= 4 && $tresureX <= 9) && ($tresureY >= 7 && $tresureY <= 8)) {
        echo "Cook".PHP_EOL;
    } else {
        echo "On the bottom of the ocean".PHP_EOL;
    }
}
