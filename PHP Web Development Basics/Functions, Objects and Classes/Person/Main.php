<?php
include "Person.php";

$person = new Person();
echo(count(get_object_vars($person)));