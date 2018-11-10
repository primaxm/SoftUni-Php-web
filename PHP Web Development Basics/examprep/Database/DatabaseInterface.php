<?php

namespace Database;


interface DatabaseInterface
{
    /**
     * @param string $query
     * @return StatementInterface
     */
    public function query(string $query) : StatementInterface;

    public function lastInsertId() : int;

    public function getLastError() : array;
}