<?php
spl_autoload_register();

$circle = new Circle(10);
echo $circle . PHP_EOL;

$rectangle = new Rectangle(15, 35);
echo $rectangle;