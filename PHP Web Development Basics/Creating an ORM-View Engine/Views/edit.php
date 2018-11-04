<form method="post">
    <input type="hidden" name="product_id" value="<?=$data->getProductId()?>" />
    <table>
        <tr>
            <th>Product name: </th>
            <td><input type="text" name="product_name" value="<?=$data->getProductName()?>" /></td>
        </tr>
        <tr>
            <th>Product price: </th>
            <td><input type="text" name="price" value="<?=$data->getPrice()?>" /></td>
        </tr>
        <tr>
            <th>Product description: </th>
            <td><textarea name="description"><?=$data->getDescription()?></textarea></td>
        </tr>
        <tr>
            <th>Product category: </th>
            <td>
                <select name="cat_id">
                    <option value=""></option>
                    <?php
                        foreach ($data->getCategoryList() as $category) {
                            $selected = ($category->getCatId() == $data->getCatId()) ? "selected" : "";?>

                            <option value="<?=$category->getCatId()?>" <?=$selected?>><?=$category->getCatName()?></option>
                        <?php };
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="save" value="1">Create</td>
        </tr>
    </table>
</form>