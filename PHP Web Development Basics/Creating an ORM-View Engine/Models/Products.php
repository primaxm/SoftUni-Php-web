<?php

namespace Models;

use Database\PDODatabase;
use DTO\ProductDTO;
use PDO;

/**
 * Class Products
 */
class Products
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
        $stm = $this->db->query('SELECT p.product_id, p.product_name, p.create_date, c.cat_name 
                                            FROM products p 
                                            INNER JOIN categories c USING (CAT_ID)');
        $result = $stm->execute();
        foreach ($result->fetch(ProductDTO::class) as $row) {
            yield $row;
        }
    }

    public function getOne($product_id)
    {
       $stmt = $this->db->query("SELECT p.product_id, p.product_name, p.create_date, c.cat_name, p.description, p.last_update, p.price, p.cat_id 
                                            FROM products p 
                                            INNER JOIN categories c USING (CAT_ID)
                                            WHERE p.product_id = :product_id");
        $result = $stmt->execute(["product_id" => $product_id]);
        return $result->getOne(ProductDTO::class);
    }

    public function createProduct($product_name, $price, $description, $cat_id)
    {
        $stmt = $this->db->query("INSERT INTO products (PRODUCT_NAME, PRICE, DESCRIPTION, CAT_ID) 
                                    VALUES (:product_name, :price, :description, :cat_id)");
        $stmt->execute(["product_name"=>$product_name,
            "price"=>$price,
            "description"=>$description,
            "cat_id"=>$cat_id]);

        return $this->db->lastInsertId();

    }

    public function editProduct($product_id, $product_name, $price, $description, $cat_id)
    {
        $stmt = $this->db->query("UPDATE products 
                                            SET PRODUCT_NAME = :product_name, 
                                            PRICE = :price, 
                                            DESCRIPTION = :description, 
                                            CAT_ID = :cat_id
                                            WHERE PRODUCT_ID = :product_id");
        $stmt->execute(["product_name"=>$product_name,
            "price"=>$price,
            "description"=>$description,
            "cat_id"=>$cat_id,
            "product_id"=>$product_id]);

        return $product_id;
    }


}