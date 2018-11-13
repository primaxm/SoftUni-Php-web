<?php

namespace App\Data;

use Exception;

class UserDTO
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $fullName;

    private $bornOn;

    /**
     * @var string
     */
    private $error;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @throws Exception
     */
    public function setUsername(string $username): void
    {
        if (strlen($username) < 4 || strlen($username) > 255) {
            throw new Exception("Username must be between 4 and 255 characters!");
        }
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @throws Exception
     */
    public function setPassword(string $password): void
    {
        if (strlen($password) < 4 || strlen($password) > 255) {
            throw new Exception("Password must be between 4 and 255 characters!");
        }
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    public function setFullName(string $fullName): void
    {
        if (strlen($fullName) < 5 || strlen($fullName) > 255) {
            throw new Exception("Fullname must be between 5 and 255 characters!");
        }
        $this->fullName = $fullName;
    }


    /**
     * @return string
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    /**
     * @return array
     */
    public function getData($key): ?string
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return null;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
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
    public function setBornOn($bornOn): void
    {
        $this->bornOn = $bornOn;
    }


}