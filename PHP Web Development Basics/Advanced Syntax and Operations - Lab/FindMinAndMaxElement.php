<?php
$input = explode(", ", readline());
$max = -2147483647;
$min = 2147483647;

for ($i = 0; $i < $input[0]; $i++) {
    $arr = explode(", ", readline());
    array_map(function($a) {intval($a);}, $arr);
    $maxTmp = max($arr);
    $max = max((int)$maxTmp, $max);
    $minTmp = min($arr);
    $min = min((int)$minTmp, $min);
}

echo "Min: $min\n";
echo "Max: $max";