<?php

namespace Controllers;

use Database\PDODatabase;
use DTO\ProductDTO;

class ProductsController extends BaseController
{
    /**
     * ProductsController constructor.
     * @param PDODatabase $db
     * @param string $controllerName
     */
    public function __construct(PDODatabase $db, string $controllerName)
    {
        parent::__construct($db, $controllerName);
        $this->model = new \Models\Products($this->db);

    }


    public function index()
    {
        $this->renderView(__FUNCTION__);
    }

    public function edit($id)
    {
        $data = new ProductDTO();
        if ($_POST) {
            //$this->db->beginTransaction();
            if ($id) {
                $product_id = $this->model->editProduct(
                    $_POST["product_id"],
                    $_POST["product_name"],
                    $_POST["price"],
                    $_POST["description"],
                    $_POST["cat_id"]
                );
                $mode = 2;
            } else {
                $product_id = $this->model->createProduct(
                    $_POST["product_name"],
                    $_POST["price"],
                    $_POST["description"],
                    $_POST["cat_id"]
                );
                $mode = 1;
            }
            //$this->db->commit();
            header("Location: /basic/products/view/$product_id/$mode");
            //$this->redirect("/products/view/$product_id/$mode");
        } elseif ($id) {
            $data = $this->model->getOne($id);
        }

        $categories_model = new \Models\Categories($this->db);
        $data->setCategoryList($categories_model->getList());
        $this->renderView(__FUNCTION__, $data);
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function view($id)
    {
        if (isset($_GET["mode"]) && $_GET["mode"] == 1) {
            echo "Product was added successfully";
        } elseif (isset($_GET["mode"]) && $_GET["mode"] == 2) {
            echo "Product was udated successfully";
        }

        if (!$id) {
            throw new \Exception("No product id!");
        }

        $data['product'] = $this->model->getOne($id);
        if (!$data['product']) {
            throw new \Exception("No product found!");
        }

        $this->renderView(__FUNCTION__, $data);
    }

}