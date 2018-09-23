<?php
$num = (int)readline();
if ($num > 0 && $num < 13) {
    $dt = DateTime::createFromFormat('!m', $num);
    echo $dt->format('F');
} else {
    echo "Invalid Month!";
}
