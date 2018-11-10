<?php

namespace App\Service;


use App\Data\CategoryDTO;
use App\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function selectCategoryList(): \Generator
    {
        return $this->categoryRepository->selectCategories();
    }

    public function getOneCategory(int $catId): CategoryDTO
    {
        return $this->categoryRepository->getCategoryById($catId);
    }
}