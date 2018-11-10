<?php

namespace Database;

use PDO;

class DBConnection
{
    public static function GetConnection (string $dsn, string $username, string $password) {
        return new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

}