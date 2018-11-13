<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9.11.2018 г.
 * Time: 16:34 ч.
 */

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


    /**
     * @param UserDTO $userDTO
     * @param $confirmPassword
     * @return int|null
     * @throws \Exception
     */
    public function register(UserDTO $userDTO, $confirmPassword): int
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            throw new \Exception("Passwords does not match!");
            //return null;
        }

        if($this->userRepository->SelectUserByUsername($userDTO->getUsername()) !== null) {
            throw new \Exception("This username is allready teken, pelase select another username!");
            //return null;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insertUser($userDTO);
    }

    /**
     * @param string $username
     * @param string $password
     * @return UserDTO|null
     * @throws \Exception
     */
    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->selectUserByUsername($username);

        if ($currentUser === null) {
            throw new \Exception("Yor username does not exist. You may want to <a href=\"register.php\">register</a> first");
        }

        $currentPasswordHash = $currentUser->getPassword();

        if (false === password_verify($password, $currentPasswordHash)) {
            throw new \Exception("Wrong password! Did you forget it?");

        }
        return $currentUser;
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

    public function profile($id) : UserDTO {
        return $this->userRepository->selectUserById($id);
    }
}