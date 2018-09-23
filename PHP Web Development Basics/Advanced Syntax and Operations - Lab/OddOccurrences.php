<?php
$input = explode(" ", readline());
$arr = [];

for ($i = 0; $i < count($input); $i++) {
    $element = strtolower($input[$i]);
    if (array_key_exists($element,$arr)) {
        $arr[$element] += 1;
    } else {
        $arr[$element] = 1;
    }
}

$arr = array_filter($arr, function($a) {if($a % 2 !== 0) return $a;});
echo implode(", ", array_keys($arr));
