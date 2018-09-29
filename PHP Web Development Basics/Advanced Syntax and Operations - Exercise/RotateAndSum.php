<?php
$input = array_map("intval", explode(" ", readline()));
$k = intval(readline());
$tmp = [];

for ($i = 0; $i < $k; $i++) {
    $tmp[$i] = $input;
    if ($i !== 0) $tmp[$i] = $tmp[$i-1];
    array_unshift($tmp[$i], end($tmp[$i]));
    array_pop($tmp[$i]);
}

$output = [];

for ($a = 0; $a < count($tmp); $a++) {
    for ($b = 0; $b < count($tmp[$a]); $b++) {
        if ($a === 0) {
            $output[$b] = $tmp[$a][$b];
        } else {
            $output[$b] += $tmp[$a][$b];
        }

    }
}

echo implode(" ", $output);