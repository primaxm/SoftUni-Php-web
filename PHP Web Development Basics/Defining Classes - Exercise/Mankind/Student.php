<?php

class Student extends Human
{
    /**
     * @var string
     */
    private $facultyNumber;

    public function __construct(string $fisrtName, string $lastName, string $facultyNumber)
    {
        parent::__construct($fisrtName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return int
     */
    public function getFacultyNumber(): int
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    public function setFacultyNumber(string $facultyNumber): void
    {
        if (!preg_match("/^[\d]{5,10}$/", $facultyNumber)) {
            throw new Exception("Invalid faculty number!");
        }
        $this->facultyNumber = $facultyNumber;
    }


    public function __toString()
    {
        $output = "First Name: " . parent::getfisrtName() . PHP_EOL . "Last Name: " . parent::getLastName() . PHP_EOL . "Faculty number: " . $this->facultyNumber . PHP_EOL;
        return $output;
    }

}
