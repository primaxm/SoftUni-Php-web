<?php

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;


    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserDTO $userDTO, $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }

        if($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null) {
            return false;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);

        if ($currentUser === null) {
            return null;
        }

        $currentPasswordHash = $currentUser->getPassword();

        if (false === password_verify($password, $currentPasswordHash)) {
            return null;
        }
        return $currentUser;
    }

    public function currentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }

        return $this->userRepository->findOneById($_SESSION['id']);
    }

    public function edit(UserDTO $userDTO): bool
    {
        $sesUser = $this->userRepository->findOneById($_SESSION['id']);
        if($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null  &&
            $this->userRepository->findOneByUsername($userDTO->getUsername())->getUsername() !==
            $this->userRepository->findOneByUsername($sesUser->getUsername())->getUsername()) {
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update($_SESSION['id'], $userDTO);
    }

    /**
     * @param UserDTO $userDTO
     */
    public function encryptPassword(UserDTO $userDTO): void
    {
        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }

    /**
     * @return \Generator|null|UserDTO[]
     */
    public function all(): ?\Generator
    {
        return $this->userRepository->findAll();
    }
}