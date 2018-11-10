<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 10.11.2018 г.
 * Time: 12:18 ч.
 */

namespace App\Service;


use App\Data\CategoryDTO;

interface CategoryServiceInterface
{
    public function selectCategoryList() :\Generator;
    public function getOneCategory(int $catId) : CategoryDTO;
}