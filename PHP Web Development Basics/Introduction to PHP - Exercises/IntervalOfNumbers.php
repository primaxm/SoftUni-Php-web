<?php
$num1 = (int)readline();
$num2 = (int)readline();

for($i = min($num1, $num2); $i <= max($num1, $num2); $i++) {
    echo $i . "\n";
}