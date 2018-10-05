<?php

class Person {
    public $age;
    public $name;

    /**
     * Person constructor.
     * @param $age
     * @param $name
     */
    public function __construct(string $name, int $age)
    {
        $this->age = $age;
        $this->name = $name;
        echo $this->name . " " . $this->age;
    }


    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}