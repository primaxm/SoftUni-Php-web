<?php

spl_autoload_register();

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());

/*try {*/
    $b1 = new box($length, $width, $height);
    echo $b1->getSurfaceArea() . PHP_EOL;
    echo $b1->getLateralSurfaceArea() . PHP_EOL;
    echo $b1->getVolume();
/*} catch (Exception $e) {
    echo $e->getMessage();
}*/


