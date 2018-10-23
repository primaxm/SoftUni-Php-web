<?php

$kuku = [];

$a = readline();

while($a != "End") {
    $kuku[$a] = $a;
    $a = readline();
}

foreach ($kuku as $key => $value) {
    echo $key . " => " . $value . PHP_EOL;
}