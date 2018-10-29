<?php

interface Identification {
    public function setId(string $id);
}

class Citizen implements Identification {
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $age;

    /**
     * Citizen constructor.
     * @param string $id
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age, string $id)
    {
        $this->setId($id);
        $this->name = $name;
        $this->age = $age;
    }


    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): string
    {
        return $this->id;
    }


}

class Robot implements Identification {
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $model;

    /**
     * Robot constructor.
     * @param string $id
     * @param string $model
     */
    public function __construct(string $id, string $model)
    {
        $this->setId($id);
        $this->model = $model;
    }


    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): string
    {
        return $this->id;
    }


}

$humans = [];
$robots = [];
$nums = [];

while ($input = readline()) {
    if ($input == "End") break;
    $splited = explode(" ", $input);
    if (count($splited) == 3) {
        $humans[] = new Citizen($splited[0], $splited[1], $splited[2]);
        $nums[] = $splited[2];
    } else {
        $robots[] = new Robot(intval($splited[1]), $splited[0]);
        $nums[] = $splited[1];
    }
}

$n = intval(readline());
$regex = "/{$n}$/";
/*foreach ($humans as $human_obj) {
    if(preg_match($regex, $human_obj->getId())) {
        echo $human_obj->getId() . PHP_EOL;
    }
}

foreach ($robots as $robot_obj) {
    if(preg_match($regex, $robot_obj->getId())) {
        echo $robot_obj->getId() . PHP_EOL;
    }
}*/

foreach ($nums as $num) {
    if(preg_match($regex, $num)) {
        echo $num . PHP_EOL;
    }
}