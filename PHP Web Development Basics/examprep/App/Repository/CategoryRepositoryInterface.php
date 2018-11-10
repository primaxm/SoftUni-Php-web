<?php

namespace App\Repository;


use App\Data\CategoryDTO;

interface CategoryRepositoryInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function selectCategories() :\Generator;

    /**
     * @return CategoryDTO
     */
    public function getCategoryById(int $categoryId): ?CategoryDTO;
}