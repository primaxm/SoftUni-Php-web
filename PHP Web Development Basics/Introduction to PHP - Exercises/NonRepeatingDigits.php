<?php
$number = (int)readline();
$result = [];

if ($number < 100) {
    echo "no";
} else {
    if ($number > 999) $number = 999;
    for ($a = 100; $a <= $number; $a++) {
        $arr = str_split($a);
        if ($arr[0] !== $arr[1] && $arr[0] !== $arr[2] && $arr[1] !== $arr[2]) {
            array_push($result, $a);
        }
    }
}

echo implode(", ", $result);