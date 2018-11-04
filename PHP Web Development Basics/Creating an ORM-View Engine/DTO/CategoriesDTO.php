<?php

namespace DTO;


class CategoriesDTO
{
    /**
     * @var integer
     */
    private $catId;

    /**
     * @var string
     */
    private $catName;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->catName;
    }

    /**
     * @param string $catName
     */
    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }


}