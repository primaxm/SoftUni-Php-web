<?php
$num = (int)readline();
$multiplier = (int)readline();
if ($multiplier > 10) {
    echo "$num X $multiplier = " . $num * $multiplier . "\n";
} else {
    for($i = $multiplier; $i <= 10; $i++) {
        echo "$num X $i = " . $num * $i . "\n";
    }
}
