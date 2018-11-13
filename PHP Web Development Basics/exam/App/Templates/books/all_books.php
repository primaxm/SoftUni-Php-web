<?php /** @var App\Data\BookDTO $data */

/*foreach ($data as $bookDTO) {
    var_dump($bookDTO);
}
exit;*/
?>

<h1>All books</h1>

<div><a href="add_book.php">Add new book</a> | <a href="profile.php">My profile</a> | <a href="logout.php">Logout</a></div>
<br />
<table border="1">
    <tr><td>Title</td><td>Author</td><td>Genre</td><td>Added by User</td><td>Details</td></tr>
    <?php

    /** @var App\Data\BookDTO $bookDTO */
        foreach ($data as $bookDTO) {
            echo "<tr>";
            echo "<td>" . $bookDTO->getTitle() . "</td><td>"
                . $bookDTO->getAuthor(). "</td><td>"
                . $bookDTO->getGenreName() . "</td><td>"
                . $bookDTO->getUsername() . "</td><td><a href=\"view.php?bookid=" . $bookDTO->getBookId() . "\">Details</a></td>";
            echo "</tr>";
        }

    ?>
</table>