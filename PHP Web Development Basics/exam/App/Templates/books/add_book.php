<?php /** @var App\Data\BookDTO $data */

?>

<h1>Add new book</h1>

<?php
if ($data->getError() !== null) {
    echo "<div style='color:red'>" . $data->getError() . "</div>";
}
?>
<div><a href="profile.php">My profile</a></div><br />
<form method="POST">
    <div>
        Book title: <input type="text" value="<?=$data->getData('title')?>" name="title" minlength="3" maxlength="50">
    </div>
    <div>
        Book author: <input type="text" value="<?=$data->getData('author')?>" name="author" minlength="3" maxlength="50">
    </div>
    <div>
        Description: <textarea name="description" rows="4" cols="30"><?=$data->getData('description')?></textarea>
    </div>
    <div>
        Image URL: <input type="text" value="<?=$data->getData('image')?>" name="image">
    </div>
    <div>
        Genre:
        <select name="genre_id">
    <?php
    /** @var App\Data\GenreDTO $genreDTO */
        foreach ($data->getGenreList() as $genreDTO) {
            $selected = "";
            if ($data->getData('genre_id') == $genreDTO->getGenreId()) {
                $selected = "selected";
            }
            echo "<option $selected value=\"" . $genreDTO->getGenreId() . "\">" . $genreDTO->getName() . "</option>";
        }
    ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Add" name="add">
    </div>

</form>
