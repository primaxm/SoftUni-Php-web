<?php
namespace Models;

use Database\PDODatabase;
use DTO\ProductDTO;
use PDO;

class Categories
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * Products constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function getList () {
        $stmt = $this->db->query("SELECT cat_id AS catId, cat_name AS catName 
                                            FROM categories");
        $result = $stmt->execute();
        foreach ($result->fetch(\DTO\CategoriesDTO::class) as $row) {
            yield $row;
        }
    }
}