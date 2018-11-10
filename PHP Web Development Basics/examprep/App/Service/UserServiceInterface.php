<?php

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, $confirmPassword): int;
    public function login(string $username, string $password) : ?UserDTO;
}