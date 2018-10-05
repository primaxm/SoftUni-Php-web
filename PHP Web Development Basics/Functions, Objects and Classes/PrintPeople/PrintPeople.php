<?php
include "Person.php";

$in = readline();
$persons = [];

while($in !== "END"){
    list($name, $age, $occupation) = explode(" ", $in);
    $person = new Person($name, intval($age), $occupation);
    $persons[] = $person;
    $in = readline();
}

uasort($persons, function ($obj1, $obj2) {
    return $obj1->age <=> $obj2->age;
});

foreach ($persons as $personObj) {
    echo $personObj->name . " - age: " . $personObj->age . ", occupation: " . $personObj->occupation .PHP_EOL;
}