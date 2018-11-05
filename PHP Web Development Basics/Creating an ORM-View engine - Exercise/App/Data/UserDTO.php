<?php

namespace App\Data;


class UserDTO
{
    private $id;

    private $username;


    private $password;


    private $firstName;


    private $lastName;

    private $bornOn;

    public static function create($username, $password, $firstName, $lastName, $bornOn, $id = null) {
        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setBornOn($bornOn)
            ->setId($id);
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username): UserDTO
    {
        $this->username = $username;
        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): UserDTO
    {
        $this->password = $password;
        return $this;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName): UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function setLastName($lastName): UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBornOn()
    {
        return $this->bornOn;
    }

    /**
     * @param mixed $bornOn
     */
    public function setBornOn($bornOn): UserDTO
    {
        $this->bornOn = $bornOn;
        return $this;
    }


}