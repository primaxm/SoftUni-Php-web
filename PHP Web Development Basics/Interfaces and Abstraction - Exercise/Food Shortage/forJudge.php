<?php

abstract class Buyer {
    /**
     * @var int
     */
    private $food = 0;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $age;

    /**
     * Buyer constructor.
     * @param int $food
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @param int $food
     */
    public function setFood(int $food): void
    {
        $this->food = $food;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }


    abstract public function BuyFood();
}

class Citizen extends Buyer {
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $birthdate;

    /**
     * Citizen constructor.
     * @param int $food
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthdate
     */
    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        parent::__construct($name, $age);
        $this->setId($id);
        $this->setBirthDate($birthdate);
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @param string $id
     */
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

    public function BuyFood() {
        $this->setFood($this->getFood() + 10);
    }

}


class Rebel extends Buyer {
    /**
     * @var string
     */
    private $group;

    /**
     * Rebel constructor.
     * @param string $group
     */
    public function __construct(string $name, int $age, string $group)
    {
        parent::__construct($name, $age);
        $this->group = $group;
    }


    public function BuyFood() {
        $this->setFood($this->getFood() + 5);
    }
}

$n = intval(readline());
/**
 * @var Buyer[]
 */
$data = [];

for ($a = 0; $a < $n; $a++) {
    $splited = explode(" ", readline());
    if (!array_key_exists($splited[0], $data)) {
        if (count($splited) == 4) {
            $data[$splited[0]] = new Citizen($splited[0], $splited[1], $splited[2], $splited[3]);
        } elseif (count($splited) == 3) {
            $data[$splited[0]] = new Rebel($splited[0], $splited[1], $splited[2]);
        }
    }
}

$sumFoods = 0;
while($in = readline()) {
    if($in == "End") {
        break;
    }
    if (array_key_exists($in, $data)) {
        $data[$in]->BuyFood();
        if (get_class($data[$in]) == 'Citizen') $sumFoods += 10;
        if (get_class($data[$in]) == 'Rebel') $sumFoods += 5;
    }

}

echo $sumFoods;