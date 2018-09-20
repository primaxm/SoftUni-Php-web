<?php
$string = readline();
$letters = '';
$digits = '';
$other = '';

for ($i = 0; $i < strlen($string); $i++) {
    if (ctype_alpha($string[$i])) {
        $letters .= $string[$i];
    } elseif (is_numeric($string[$i])) {
        $digits .= $string[$i];
    } else {
        $other .= $string[$i];
    }
}

echo $digits . "\n";
echo $letters . "\n";
echo $other;