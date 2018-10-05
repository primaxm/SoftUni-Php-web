<?php

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