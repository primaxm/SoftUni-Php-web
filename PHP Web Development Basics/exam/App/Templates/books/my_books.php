<?php /** @var App\Data\BookDTO $data */

/*foreach ($data as $bookDTO) {
    var_dump($bookDTO);
}
exit;*/
?>

<h1>My books</h1>

<div><a href="add_book.php">Add new book</a> | <a href="profile.php">My profile</a> | <a href="logout.php">Logout</a></div>
<br />
<table border="1">
    <tr><td>Title</td><td>Author</td><td>Genre</td><td>Edit</td><td>Delete</td></tr>
    <?php

    /** @var App\Data\BookDTO $bookDTO */
    foreach ($data as $bookDTO) {
        echo "<tr>";
        echo "<td>" . $bookDTO->getTitle() . "</td><td>"
            . $bookDTO->getAuthor(). "</td><td>"
            . $bookDTO->getGenreName() . "</td><td><a href=\"edit.php?bookid=" . $bookDTO->getBookId() . "\">Edit</a> </td>"
            . "<td><a href=\"delete_book.php?bookid=" . $bookDTO->getBookId() . "\">Delete</a> </td>";
        echo "</tr>";
    }

    ?>
</table>