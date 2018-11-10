<?php /** @var App\Data\TaskDTO $data */
?>


<h1>Edit task</h1>

<?php
echo $data->getError();
?>

<form method="POST">
    <div>
        Title: <input type="text" value="<?=$data->getTitle()?>" name="title">
    </div>
    <div>
        Category:
        <select name="categoryId">
            <?php foreach ($data->getCategoryList() as $categoryDTO) {
                $selected = "";
                if ($data->getCategoryId() == $categoryDTO->getCategoryId()) {
                    $selected = "selected";
                }
                echo "<option $selected value=\"" . $categoryDTO->getCategoryId() . "\">" . $categoryDTO->getCategoryName() . "</option>";
            }?>
        </select>

    </div>
    <div>
        Description: <input type="text" value="<?=$data->getDescription()?>" name="description">
    </div>
    <div>
        Location: <input type="text" value="<?=$data->getLocation()?>" name="location">
    </div>
    <div>
        Started on: <input type="text" value="<?=$data->getStartedOn()?>" name="startedOn">
    </div>
    <div>
        Due date: <input type="text" value="<?=$data->getDueDate()?>" name="dueDate">
    </div>
    <div>
        <input type="submit" value="Edit" name="edit">
    </div>

</form>