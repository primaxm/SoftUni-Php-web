<?php
spl_autoload_register();

$db = DBConnection::GetConnection();

$products_obj = new Products($db);

include "header.php";
echo "<a href=\"edit_product.php\">Create new product</a><br /><br />";
echo "<table border='1'>";
foreach ($products_obj->getList() as $product) {
    $date = $product["create_date"]?date("d.m.Y", strtotime($product["create_date"])):"n/a";
    echo "<tr>";
    echo "<td>" . $product["product_id"] . "</td>";
    echo "<td>" . $product["product_name"] . "</td>";
    echo "<td>" . $product["cat_name"] . "</td>";
    echo "<td>" . $date . "</td>";
    echo "<td><a href=\"view_product.php?product_id=" . $product["product_id"] . "\">view</a></td>";
    echo "<td><a href=\"edit_product.php?product_id=" . $product["product_id"] . "\">edit</a></td>";
    echo "</tr>";
}
echo "</table>";

include "footer.php";