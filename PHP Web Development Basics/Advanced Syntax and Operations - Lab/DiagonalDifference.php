<?php
$num = (int)readline();
$arr = [];
$leftSum = 0;
$rightSum = 0;

for ($i = 0; $i < $num; $i++) {
    $arr[$i] = explode(" ", readline());
    $leftSum += $arr[$i][$i];
    $rightSum += $arr[$i][$num - $i - 1];
}

echo abs($leftSum - $rightSum);