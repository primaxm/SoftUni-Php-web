<?php

namespace App\Repository;


use App\Data\GenreDTO;

interface GenreRepositoryInterface
{
    public function selectAll() :\Generator;
    public function selectById($id) :GenreDTO;
}