<?php

interface Identification {
    public function setId(string $id);
}

interface Birthdates {
    public function setBirthdate(string $Birthdate);
}

class Citizen implements Identification,  Birthdates{
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
     * @var string
     */
    private $birthdate;

    /**
     * Citizen constructor.
     * @param string $id
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->setId($id);
        $this->name = $name;
        $this->age = $age;
        $this->setBirthDate($birthdate);
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
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

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }




}

class Pet implements Birthdates {
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $birthdate;

    /**
     * Pets constructor.
     * @param string $name
     * @param string $birthdate
     */
    public function __construct(string $name, string $birthdate)
    {
        $this->setName($name);
        $this->setBirthdate($birthdate);
    }


    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
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
    public function __construct(string $model, string $id)
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

/**
 * @var Birthdates[]
 */
$data = [];

while ($input = readline()) {
    if ($input == "End") break;
    $splited = explode(" ", $input);
    $splited[3] = $splited[3]??NULL;
    $splited[4] = $splited[4]??NULL;
    if ($splited[0] != "Robot") {
        $data[] = new $splited[0]($splited[1], $splited[2], $splited[3], $splited[4]);
    }
}

$n = readline();
$regex = "/$n$/";

$output = "";
foreach ($data as $obj) {
    if(preg_match($regex, $obj->getBirthdate())) {
        $output .= $obj->getBirthdate() . PHP_EOL;
    }
}

if ($output == "") {
    echo '<no output>';
} else {
    echo $output;
}