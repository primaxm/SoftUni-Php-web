<?php

namespace App\Repository;


use App\Data\CategoryDTO;
use Database\DatabaseInterface;

class CategoryRepository implements CategoryRepositoryInterface
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

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function selectCategories(): \Generator
    {
        return $this->db->query("
        SELECT category_id as categoryId, name AS categoryName
        FROM categories")
            ->execute([])
            ->fetch(CategoryDTO::class);
    }

    /**
     * @return CategoryDTO
     */
    public function getCategoryById(int $categoryId): ?CategoryDTO
    {
        return $this->db->query("
        SELECT category_id as categoryId, name 
        FROM categories
        WHERE category_id = ?")
            ->execute([$categoryId])
            ->fetch(CategoryDTO::class)
            ->current();
    }
}