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
        Book title: <input type="text" value="<?=$data->getTitle()?>" name="title">
    </div>
    <div>
        Book author: <input type="text" value="<?=$data->getAuthor()?>" name="author">
    </div>
    <div>
        Description: <textarea name="description" rows="4" cols="30"><?=$data->getDescription()?></textarea>
    </div>
    <div>
        Image URL: <input type="text" value="<?=$data->getImage()?>" name="image">
    </div>
    <div>
        Genre:
        <select name="genre_id">
            <?php
            /** @var App\Data\GenreDTO $genreDTO */
            foreach ($data->getGenreList() as $genreDTO) {
                $selected = "";
                if ($data->getGenreId() == $genreDTO->getGenreId()) {
                    $selected = "selected";
                }
                echo "<option $selected value=\"" . $genreDTO->getGenreId() . "\">" . $genreDTO->getName() . "</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Edit" name="edit">
    </div>

</form>