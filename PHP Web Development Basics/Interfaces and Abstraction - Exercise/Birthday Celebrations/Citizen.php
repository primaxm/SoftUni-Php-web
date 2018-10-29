<?php

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