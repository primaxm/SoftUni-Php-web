<?php

namespace App\Service;


use App\Data\GenreDTO;

interface GenreServiceInterface
{
    public function selectAll(): \Generator;
    public function selectById($id) : GenreDTO;
}