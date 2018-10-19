<form method="post">
    <input type="hidden" name="product_id" value="<?=$product["product_id"]?>" />
    <table>
        <tr>
            <th>Product name: </th>
            <td><input type="text" name="product_name" value="<?=$product["product_name"]?>" /></td>
        </tr>
        <tr>
            <th>Product price: </th>
            <td><input type="text" name="price" value="<?=$product["price"]?>" /></td>
        </tr>
        <tr>
            <th>Product description: </th>
            <td><textarea name="description"><?=$product["description"]?></textarea></td>
        </tr>
        <tr>
            <th>Product category: </th>
            <td>
                <select name="cat_id">
                    <option value=""></option>
                    <?php
                        foreach ($categories_obj->getList() as $category) {
                            $selected = ($category["cat_id"] == $product["cat_id"]) ? "selected" : "";?>

                            <option value="<?=$category["cat_id"]?>" <?=$selected?>><?=$category["cat_name"]?></option>
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