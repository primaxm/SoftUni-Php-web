<?php
include "Person.php";
$name = readline();
$age = intval(readline());

$person = new Person($name, $age);
