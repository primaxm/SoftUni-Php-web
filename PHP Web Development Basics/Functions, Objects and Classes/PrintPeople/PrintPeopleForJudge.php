<?php
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

class Person
{
    public $name;
    public $age;
    public $occupation;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }


}