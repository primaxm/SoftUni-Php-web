<?php

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, $confirmPassword): bool;
    public function login(string $username, string $password) : ?UserDTO;
    public function currentUser() : ?UserDTO;
    public function edit(UserDTO $userDTO): bool;

    /**
     * @return \Generator|null|UserDTO[]
     */
    public function all() :?\Generator;
}