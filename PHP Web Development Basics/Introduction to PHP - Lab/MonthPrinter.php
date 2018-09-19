<?php
$num = readline();
$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

if ($num >= 1 && $num <= 12) {
    echo $months[$num-1];
} else {
    echo "Error!";
}