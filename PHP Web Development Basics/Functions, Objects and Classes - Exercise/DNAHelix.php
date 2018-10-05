<?php
$number = intval(readline());
dnaHelix($number);

function dnaHelix($num) {
    $arr = ["A", "T", "C", "G", "T", "T", "A", "G", "G", "G"];
    $count = 1;
    for ($i = 0; $i < $num; $i++) {

        if ($count === 1) {
            echo "**{$arr[0]}{$arr[1]}**" . PHP_EOL;
            $count++;
        } else if ($count === 2) {
            echo "*{$arr[2]}--{$arr[3]}*" . PHP_EOL;
            $count++;
        } else if ($count === 3) {
            echo "{$arr[4]}----{$arr[5]}" . PHP_EOL;
            $count++;
        } else {
            echo "*{$arr[6]}--{$arr[7]}*" . PHP_EOL;
            $count=1;
            array_unshift($arr, $arr[8], $arr[9]);
            array_slice($arr, -2, 2);
        }
    }

}

//dnaHelix(4);
