<?php
include "Person.php";
$num = intval(readline());
$arr = [];

while($num-- > 0) {
    $person = new Person;
    list($name, $age) = explode(" ", readline());
    if ($age > 30) {
        $person->setName($name);
        $person->setAge($age);
        array_push($arr, $person);
    }
}

usort($arr, function (
    Person $person1, Person $person2) {return strcmp($person1->getName(), $person2->getName());
});

foreach ($arr as $persons) {
    echo $persons->getName() . " - " . $persons->getAge() . PHP_EOL;
}