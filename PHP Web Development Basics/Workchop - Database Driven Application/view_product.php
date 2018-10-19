<?php
spl_autoload_register();

$db = DBConnection::GetConnection();

$products_obj = new Products($db);

$product_id = $_GET['product_id']??null;


include "header.php";

if(isset($_GET["mode"]) && $_GET["mode"] == 1) {
    echo "Product was added successfully";
} elseif (isset($_GET["mode"]) && $_GET["mode"] == 2) {
    echo "Product was udated successfully";
}

echo "<table>";
if ($product_id) {
    $product = $products_obj->getOne($product_id);
    if ($product) {
        foreach ($product as $key=>$value) {
            echo "<tr><td>". $key . ": " . $value . "</td></tr>";
        }
    } else {
        echo "<tr><td>No product found!</td></tr>";
    }

} else {
    echo "<tr><td>No product id!</td></tr>";
}
echo "</table>";


include "footer.php";