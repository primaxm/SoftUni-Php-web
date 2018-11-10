<?php /** @var App\Data\TaskDTO $data */?>


<h1>Add new task</h1>

<?php
echo $data->getError();
?>

<form method="POST">
    <div>
        Title: <input type="text" value="<?=$data->getData('title')?>" name="title">
    </div>
    <div>
        Category:
        <select name="categoryId">
            <?php foreach ($data->getCategoryList() as $categoryDTO) {
                $selected = "";
                if ($data->getData('categoryId') == $categoryDTO->getCategoryId()) {
                    $selected = "selected";
                }
                echo "<option $selected value=\"" . $categoryDTO->getCategoryId() . "\">" . $categoryDTO->getCategoryName() . "</option>";
            }?>
        </select>

    </div>
    <div>
        Description: <input type="text" value="<?=$data->getData('description')?>" name="description">
    </div>
    <div>
        Location: <input type="text" value="<?=$data->getData('location')?>" name="location">
    </div>
    <div>
        Started on: <input type="text" value="<?=$data->getData('startedOn')?>" name="startedOn">
    </div>
    <div>
        Due date: <input type="text" value="<?=$data->getData('dueDate')?>" name="dueDate">
    </div>
    <div>
        <input type="submit" value="Save" name="save">
    </div>

</form>