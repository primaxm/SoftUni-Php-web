<?php

class Person
{
    public $name;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function saysHello() {
        return $this->name . " says \"Hello\"!";
    }
}