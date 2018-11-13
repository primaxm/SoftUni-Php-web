<?php

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insertUser(UserDTO $userDTO) : int;
    public function selectUserById(int $userId) : ?UserDTO;
    public function SelectUserByUsername(string $username) : ?UserDTO;
}