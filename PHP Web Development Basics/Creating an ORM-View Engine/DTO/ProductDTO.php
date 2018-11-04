<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 4.11.2018 г.
 * Time: 16:55 ч.
 */

namespace DTO;


class ProductDTO
{
    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var \datetime
     */
    private $create_date;

    /**
     * @var string
     */
    private $cat_name;

    /**
     * @var integer
     */
    private $cat_id;

    /**
     * @var string
     */
    private $description;


    /**
     * @var \Generator
     */
    private $categoryList = [];

    /**
     * @return int
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string
     */
    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return float
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCreateDate(): ?string
    {
        return $this->create_date;
    }

    public function getCreateDateFormatetd() : ?string {
        return $this->create_date?date("d.m.Y", strtotime($this->create_date)):"n/a";
    }

    /**
     * @param string $create_date
     */
    public function setCreateDate(\datetime $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return string
     */
    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    /**
     * @param string $cat_name
     */
    public function setCatName(string $cat_name): void
    {
        $this->cat_name = $cat_name;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCatId(): ?int
    {
        return $this->cat_id;
    }

    /**
     * @param int $cat_id
     */
    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }


    /**
     * @return \Generator|CategoriesDTO[]
     */
    public function getCategoryList(): \Generator
    {
        return $this->categoryList;
    }

    /**
     * @param \Generator $categoryList
     */
    public function setCategoryList(\Generator $categoryList): void
    {
        $this->categoryList = $categoryList;
    }
}