<?php

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