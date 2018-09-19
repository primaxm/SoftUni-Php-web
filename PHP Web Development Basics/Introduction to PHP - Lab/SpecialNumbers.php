<?php
$number = intval(readline());

for ($i = 1; $i <= $number; $i++) {
    $isSpecial = "False";
    $n = str_split($i, 1);
    $sum = array_sum($n);
    if ($sum === 5 || $sum === 7 || $sum === 11) {
        $isSpecial = "True";
    }
    echo "$i -> $isSpecial\n";
}