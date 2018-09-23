<?php
$arr1 = explode(" ", readline());
$arr2 = explode(" ", readline());
$maxLength = max(count($arr1), count($arr2));


for ($i = 0; $i < $maxLength; $i++) {
    $arr[$i] = $arr1[$i % count($arr1)] + $arr2[$i % count($arr2)];
}

echo implode(" ", $arr);