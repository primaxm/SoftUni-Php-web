<?php

$numbers = explode(" ", readline());
$urls = explode(" ", readline());
$smartPhone = new Smartphone();
foreach ($numbers as $number) {
    try {
        echo $smartPhone->call($number) . PHP_EOL;
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

foreach ($urls as $url) {
    try {
        echo $smartPhone->browse($url) . "!". PHP_EOL;
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}