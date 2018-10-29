<?php

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