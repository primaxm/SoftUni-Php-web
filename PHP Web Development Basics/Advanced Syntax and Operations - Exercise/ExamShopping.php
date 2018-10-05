<?php
$stock = readline();
$products = [];

while($stock !== "shopping time") {
    $splited = explode(" ", $stock);
    if (array_key_exists($splited[1], $products)) {
        $products[$splited[1]] += floatval($splited[2]);
    } else {
        $products[$splited[1]] = floatval($splited[2]);
    }

    $stock = readline();
}

$sh = readline();

while($sh !== "exam time") {
    $shop = explode(" ", $sh);
    if (array_key_exists($shop[1], $products)) {
        if ($products[$shop[1]] > 0) {
            $products[$shop[1]] -= floatval($shop[2]);
        } else {
            echo "{$shop[1]} out of stock" . PHP_EOL;
        }
    } else {
        echo "{$shop[1]} doesn't exist" . PHP_EOL;
    }

    $sh = readline();
}

foreach ($products as $name => $quantity) {
    if ($quantity > 0) {
        echo $name . " -> " . $quantity . PHP_EOL;
    }
}