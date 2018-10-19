<?php

class DBConnection
{
    public static function GetConnection () {
        return new PDO("mysql: host=localhost; dbname=shop", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

}