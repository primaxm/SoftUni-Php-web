<?php

class Human
{
    /**
     * @var string
     */
    protected $fisrtName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $fisrtName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $fisrtName, string $lastName)
    {
        $this->setFisrtName($fisrtName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFisrtName(): string
    {
        return $this->fisrtName;
    }

    /**
     * @param string $fisrtName
     * @throws Exception
     */
    public function setFisrtName(string $fisrtName): void
    {
        if (!ctype_upper($fisrtName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($fisrtName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->fisrtName = $fisrtName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    public function setLastName(string $lastName): void
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

}