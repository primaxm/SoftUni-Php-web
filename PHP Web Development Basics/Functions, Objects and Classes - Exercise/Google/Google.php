<?php
include "Person.php";
include "Car.php";
include "Children.php";
include "Parents.php";
include "Company.php";
include "Pokemon.php";

$in = readline();
$persons = [];

while ($in !== "End") {
    $input = explode(" ", $in);
    if (!array_key_exists($input[0], $persons)) {
        $person = new Person();
        $person->setPersonName($input[0]);
    } else {
        $person = $persons[$input[0]];
    }
    //print_r($person);

    switch ($input[1]) {
        case "company":
            $company = new Company();
            $company->setCompanyName($input[2]);
            $company->setDepartment($input[3]);
            $company->setSalary($input[4]);
            $person->setCompany($company);
            break;
        case "pokemon":
            $pokemon = new Pokemon();
            $pokemon->setPokemonName($input[2]);
            $pokemon->setPokemonType($input[3]);
            $person->setPokemon($pokemon, $input[2]);
            break;
        case "parents":
            $parent = new Parents();
            $parent->setParentName($input[2]);
            $parent->setParentBirthday($input[3]);
            $person->setParents($parent, $input[2]);
            break;
        case "children":
            $children = new Children();
            $children->setChildName($input[2]);
            $children->setChildBirthday($input[3]);
            $person->setChildren($children, $input[2]);
            break;
        case "car":
            $car = new Car();
            $car->setCarModel($input[2]);
            $car->setCarSpeed($input[3]);
            $person->setCar($car);
            break;
    }

    $persons[$input[0]] = $person;
    $in = readline();
}

$name = readline();
echo $persons[$name]->getPersonName() . PHP_EOL;
echo "Company:" . PHP_EOL;
if(!empty($persons[$name]->getCompany())) {
    echo $persons[$name]->getCompany()->getCompanyName() . " " . $persons[$name]->getCompany()->getDepartment()
        . " " . sprintf('%0.2f', $persons[$name]->getCompany()->getSalary()) . PHP_EOL;
    //sprintf('%0.2f', $persons[$name]->getCompany()->getSalary());
    //number_format($persons[$name]->getCompany()->getSalary(), 2)
}
echo "Car:" . PHP_EOL;
if (!empty($persons[$name]->getCar())) {
    echo $persons[$name]->getCar()->getCarModel() . " " . $persons[$name]->getCar()->getCarSpeed() . PHP_EOL;
}

echo "Pokemon:" . PHP_EOL;
foreach ($persons[$name]->getPokemons() as $pokemon) {
    echo $pokemon->getPokemonName() . " " . $pokemon->getPokemonType() . PHP_EOL;
}
echo "Parents:" . PHP_EOL;
foreach ($persons[$name]->getParents() as $parent) {
    echo $parent->getParentName() . " " . $parent->getParentBirthday() . PHP_EOL;
}
echo "Children:" . PHP_EOL;
foreach ($persons[$name]->getChildren() as $child) {
    echo $child->getChildName() . " " . $child->getChildBirthday() . PHP_EOL;
}
