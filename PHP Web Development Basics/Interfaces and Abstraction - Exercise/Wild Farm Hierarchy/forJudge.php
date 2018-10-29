<?php

abstract class Food {
    /**
     * @var integer
     */
    protected $quantity = 0;

    /**
     * Food constructor.
     * @param int $quantity
     */
    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}

class Vegetable extends Food {

}

class Meat extends Food {

}

abstract class Animal {
    /**
     * @var string
     */
    protected $animalName;

    /**
     * @var string
     */
    protected $animalType;

    /**
     * @var float
     */
    protected $animalWeight;

    /**
     * @var integer
     */
    protected $foodEaten = 0;

    /**
     * Animal constructor.
     * @param string $animalName
     * @param string $animalType
     * @param float $animalWeight
     */
    public function __construct(string $animalType, string $animalName, float $animalWeight)
    {
        $this->animalName = $animalName;
        $this->animalType = $animalType;
        $this->animalWeight = $animalWeight;
    }

    /**
     * @return string
     */
    public function getAnimalName(): string
    {
        return $this->animalName;
    }

    /**
     * @return string
     */
    public function getAnimalType(): string
    {
        return $this->animalType;
    }

    /**
     * @return float
     */
    public function getAnimalWeight(): float
    {
        return $this->animalWeight;
    }

    /**
     * @return int
     */
    public function getFoodEaten(): int
    {
        return $this->foodEaten;
    }



    public abstract function makeSound();
    public abstract function eat(Food $food);
}

abstract class Mammal extends Animal {
    /**
     * @var string
     */
    protected $animalRegion;

    /**
     * Mouse constructor.
     * @param string $animalRegion
     */
    public function __construct(string $animalType, string $animalName, float $animalWeight, string $animalRegion)
    {
        parent::__construct($animalType, $animalName, $animalWeight);
        $this->animalRegion = $animalRegion;
    }

    /**
     * @return string
     */
    public function getAnimalRegion(): string
    {
        return $this->animalRegion;
    }


}

abstract class Felime extends Mammal {

}

class Mouse extends Mammal {

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food) {
        if (get_class($food) != 'Vegetable') {
            throw new Exception("Mice are not eating that type of food!");
        }
        $this->foodEaten = $food->getQuantity();
    }


    public function makeSound() {
        echo "SQUEEEAAAK!" . PHP_EOL;
    }
}

class Zebra extends Mammal {
    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food) {
        if (get_class($food) != 'Vegetable') {
            throw new Exception("Zebras are not eating that type of food!");
        }
        $this->foodEaten = $food->getQuantity();
    }

    public function makeSound() {
        echo "Zs" . PHP_EOL;
    }

}

class Cat extends Felime {
    /**
     * @var string
     */
    protected $catBreed;

    /**
     * Cat constructor.
     * @param string $catBreed
     */
    public function __construct(string $animalType, string $animalName, float $animalWeight, string $animalRegion, string $catBreed)
    {
        parent::__construct($animalType, $animalName, $animalWeight, $animalRegion);
        $this->catBreed = $catBreed;
    }

    /**
     * @return string
     */
    public function getCatBreed(): string
    {
        return $this->catBreed;
    }


    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food) {
        $this->foodEaten = $food->getQuantity();
    }

    public function makeSound() {
        echo "Meowwww" . PHP_EOL;
    }

}

class Tiger extends Felime {
    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food) {
        if (get_class($food) != 'Meat') {
            throw new Exception("Tigers are not eating that type of food!");
        }
        $this->foodEaten = $food->getQuantity();
    }

    public function makeSound() {
        echo "ROAAR!!!" . PHP_EOL;
    }
}

$animal = NULL;
$count = 2;
while ($in = readline()) {
    if ($in == "End") break;
    if ($count % 2 == 0) {
        $input = explode(" ", $in);
        if ($input[0] == 'Cat') {
            $animal = new Cat($input[0], $input[1], floatval($input[2]), $input[3], $input[4]);
        } else {
            $animal = new $input[0]($input[0], $input[1], floatval($input[2]), $input[3]);
        }
    } else {
        [$foodType, $quantity] = explode(" ", $in);
        $food = new $foodType(intval($quantity));
        if (get_class($animal) == "Cat") {
            $animal->makeSound();
            try {
                $animal->eat($food);
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
            echo $animal->getAnimalType() . "[" . $animal->getAnimalName() . ", " . $animal->getCatBreed() . ", " .
                $animal->getAnimalWeight() . ", " . $animal->getAnimalRegion() . ", " . $animal->getFoodEaten() . "]"  . PHP_EOL;
        } else {
            $animal->makeSound();
            try {
                $animal->eat($food);
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
            echo $animal->getAnimalType() . "[" . $animal->getAnimalName() . ", " .
                $animal->getAnimalWeight() . ", " . $animal->getAnimalRegion() . ", " . $animal->getFoodEaten() ."]"  . PHP_EOL;

        }
    }
    $count++;
}


