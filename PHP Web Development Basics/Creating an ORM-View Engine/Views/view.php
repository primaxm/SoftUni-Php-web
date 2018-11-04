
<?php
/**  @var \DTO\ProductDTO $data*/
?>

    <table>
        <tr>
            <th>Product name: </th>
            <td><?=$data['product']->getProductName()?></td>
        </tr>
        <tr>
            <th>Product price: </th>
            <td><?=$data['product']->getPrice()?></td>
        </tr>
        <tr>
            <th>Product description: </th>
            <td><?=$data['product']->getDescription()?></td>
</tr>
</table>