<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9.11.2018 г.
 * Time: 15:56 ч.
 */

namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insertUser(UserDTO $userDTO): int
    {
        $this->db->query("
        INSERT INTO users(username, password, full_name, born_on) 
        VALUES (?, ?, ?, ?)
        ")->execute([
        $userDTO->getUsername(),
        $userDTO->getPassword(),
        $userDTO->getFullName(),
        $userDTO->getBornOn(),
    ]);

        return $this->db->lastInsertId();

    }

    public function selectUserById(int $userId): ?UserDTO
    {
        return $this->db->query("
        SELECT user_id AS userId, username, password, full_name AS fullName, born_on AS bornOn 
        FROM users 
        WHERE user_id = ?
        ")->execute([
            $userId
        ])->fetch(UserDTO::class)
            ->current();
    }

    public function SelectUserByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
        SELECT user_id AS userId, username, password, full_name AS fullName, born_on AS bornOn 
        FROM users 
        WHERE username = ?
        ")->execute([
            $username
        ])->fetch(UserDTO::class)
            ->current();
    }
}