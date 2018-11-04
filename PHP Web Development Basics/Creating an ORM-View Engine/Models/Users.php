<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 31.10.2018 г.
 * Time: 10:35 ч.
 */

namespace Models;

use Database\PDODatabase;

class Users
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * Products constructor.
     * @param  $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    /**
     * @param $_POST
     * @return mixed
     * @throws \Exception
     */
    public function saveUser()
    {
        $username = $_POST['username']??null;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $names = $_POST['names'];

        $stmt = $this->db->prepare("INSERT INTO users (USERNAME, PASSWORD, NAMES) 
                                    VALUES (:username, :password, :names)");
        $stmt->bindParam("username", $username);
        $stmt->bindParam("password", $password);
        $stmt->bindParam("names", $names);

        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception("User alredy exist in DB");
        }


        return $this->db->lastInsertId();
    }

    /**
     * @throws \Exception
     */
    public function logUser() :?int
    {
        $username = $_POST['username']??null;
        $password = $_POST['password']??null;

        $stmt = $this->db->prepare("select userid, password from users where username = :username");
        $stmt->bindparam("username", $username);
        try {
            $stmt->execute();
        } catch (\pdoexception $e) {
            throw new \exception("no such user");
        }
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['password'])) {
            return $result['userid'];
        }
        return null;

    }

}