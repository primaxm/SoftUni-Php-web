<?php
include "Family.php";
include "Person.php";

$number = intval(readline());
$family = new Family();

while($number-- > 0) {
    list($name, $age) = explode(" ", readline());
    $person = new Person();
    $person->setPersonName($name);
    $person->setPersonAge($age);
    $family->addMember($person);
}

$oldes = $family->getOldestMember();
echo $oldes->getPersonName() . " " . $oldes->getPersonAge();

