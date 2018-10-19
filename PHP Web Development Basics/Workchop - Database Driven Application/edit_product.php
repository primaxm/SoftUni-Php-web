<?php
spl_autoload_register();

$db = DBConnection::GetConnection();

$product = ["product_id" => "", "product_name" => "", "price" => "", "description" => "", "cat_id" => ""];
$products_obj = new Products($db);
$categories_obj = new Categories($db);

if ($_POST) {
    $db->beginTransaction();
    if (isset($_POST["product_id"])) {
        $product_id = $products_obj->editProduct($_POST["product_id"], $_POST["product_name"], $_POST["price"], $_POST["description"], $_POST["cat_id"]);
        $mode = 2;
    } else {
        $product_id = $products_obj->createProduct($_POST["product_name"], $_POST["price"], $_POST["description"], $_POST["cat_id"]);
        $mode = 1;
    }
    $db->commit();
    header("Location: view_product.php?product_id=$product_id&mode=$mode" );
    exit;
} elseif (isset($_GET["product_id"])) {
    $product = $products_obj->getOne($_GET["product_id"]);
}


include "header.php";
include "create_form.php";
include "footer.php";