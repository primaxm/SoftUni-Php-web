<?php
spl_autoload_register();

$personSplit = explode(";", readline());
$productsInput = explode(";", readline());

$products = [];
$persons = [];

for ($a = 0; $a < count($personSplit)-1; $a++) {
    list($name, $money) = explode("=", $personSplit[$a]);
    try {
        $person = new Person($name, floatval($money));
        $persons[$name] = $person;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        exit;
    }
}


for ($a = 0; $a < count($productsInput)-1; $a++) {
    list($name, $cost) = explode("=", $productsInput[$a]);
    try {
        $product = new Product($name, floatval($cost));
        $products[$name] = $product;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}


$command = readline();

while ($command != "END") {
    $splited = explode(" ", $command);
    $name = trim($splited[0]);
    $prod = trim($splited[1]);
    if (array_key_exists($name, $persons) && array_key_exists($prod, $products)) {
        try {
            $persons[$name]->setProductsInBag($products[$prod]);
            echo  $name . " bought " . $prod . PHP_EOL;
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }


    $command = readline();

}

foreach ($persons as $personName => $personObj) {
    echo $personName . " - ";
    if (count($personObj->getBagOfProducts()) > 0) {
        echo implode(",", array_map(function($obj){return $obj->getName();}, $personObj->getBagOfProducts())) . PHP_EOL;
    } else {
        echo "Nothing bought";
    }

}