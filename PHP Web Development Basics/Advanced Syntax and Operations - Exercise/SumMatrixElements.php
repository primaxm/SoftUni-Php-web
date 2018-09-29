<?php
$dimension = array_map("intval", explode(" ", readline()));
$sum = 0;

for ($i = 0; $i < $dimension[0]; $i++) {
    $sum += array_reduce(array_map("intval", explode(" ", readline())), function ($a, $b){return $a+$b;});
}

echo $dimension[0] . PHP_EOL . $dimension[1] . PHP_EOL . $sum;