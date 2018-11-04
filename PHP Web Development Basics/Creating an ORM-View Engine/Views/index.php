<?php

echo "<a href=\"products/edit\">Create new product</a><br /><br />";
echo "<table border='1'>";
/** @var \Models\Products $model */
/** @var \DTO\ProductDTO $product */
foreach ($this->model->getList() as $product) {
    echo "<tr>";
    echo "<td>" . $product->getProductId() . "</td>";
    echo "<td>" . $product->getProductName() . "</td>";
    echo "<td>" . $product->getCatName() . "</td>";
    echo "<td>" . $product->getCreateDateFormatetd() . "</td>";
    echo "<td><a href=\"products/view/" . $product->getProductId() . "\">view</a></td>";
    echo "<td><a href=\"products/edit/" . $product->getProductId() . "\">edit</a></td>";
    echo "</tr>";
}
echo "</table>";