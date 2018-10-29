<?php
spl_autoload_register();
$name = readline();

$ferrari = new Ferrari($name);
echo $ferrari;