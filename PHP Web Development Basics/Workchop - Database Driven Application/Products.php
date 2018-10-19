<?php

/**
 * Class Products
 */
class Products
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Products constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getList () {
        $result = $this->db->query("SELECT p.product_id, p.product_name, p.create_date, c.cat_name 
                                            FROM products p 
                                            INNER JOIN categories c USING (CAT_ID)");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            yield $row;
        }
    }

    public function getOne(int $product_id)
    {
       $result = $this->db->prepare("SELECT p.product_id, p.product_name, p.create_date, c.cat_name, p.description, p.last_update, p.price, p.cat_id 
                                            FROM products p 
                                            INNER JOIN categories c USING (CAT_ID)
                                            WHERE p.product_id = :product_id");
        $result->bindParam("product_id", $product_id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($product_name, $price, $description, $cat_id)
    {
        $stmt = $this->db->prepare("INSERT INTO products (PRODUCT_NAME, PRICE, DESCRIPTION, CAT_ID) 
                                    VALUES (:product_name, :price, :description, :cat_id)");
        $stmt->bindParam("product_name", $product_name);
        $stmt->bindParam("price", $price);
        $stmt->bindParam("description", $description);
        $stmt->bindParam("cat_id", $cat_id);
        $stmt->execute();

        return $this->db->lastInsertId();

    }

    public function editProduct($product_id, $product_name, $price, $description, $cat_id)
    {
        $stmt = $this->db->prepare("UPDATE products 
                                            SET PRODUCT_NAME = :product_name, 
                                            PRICE = :price, 
                                            DESCRIPTION = :description, 
                                            CAT_ID = :cat_id
                                            WHERE PRODUCT_ID = :product_id");
        $stmt->bindParam("product_name", $product_name);
        $stmt->bindParam("price", $price);
        $stmt->bindParam("description", $description);
        $stmt->bindParam("cat_id", $cat_id);
        $stmt->bindParam("product_id", $product_id);
        $stmt->execute();

        return $product_id;
    }


}