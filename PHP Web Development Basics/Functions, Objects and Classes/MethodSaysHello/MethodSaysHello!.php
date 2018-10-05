<?php
include "Person.php";

$name = readline();

$person = new Person($name);
echo $person->saysHello();