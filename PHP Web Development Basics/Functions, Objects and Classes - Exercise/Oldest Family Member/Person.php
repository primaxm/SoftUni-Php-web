<?php

class Person {
    private $personName;
    private $personAge;

    /**
     * @return mixed
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * @param mixed $personName
     */
    public function setPersonName($personName): void
    {
        $this->personName = $personName;
    }

    /**
     * @return mixed
     */
    public function getPersonAge()
    {
        return $this->personAge;
    }

    /**
     * @param mixed $personAge
     */
    public function setPersonAge($personAge): void
    {
        $this->personAge = $personAge;
    }

}