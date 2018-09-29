<?php
$input = explode(" ", readline());
$sum = 0;
foreach ($input as $val) {
    $val = strrev($val);
    $sum += intval($val);
}

echo $sum;