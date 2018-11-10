<?php /** @var App\Data\TaskDTO $data */
?>

    <h1>All tasks</h1>

<a href="add.php">Add new task</a> | <a href="logout.php">Logout</a>

<?php
echo "<table border='1'>";
echo "<tr><td>Title</td><td>Category</td><td>Author</td><td>Edit</td><td>Delete</td></tr>";
/** @var \App\Data\TaskDTO $taskDTO */
foreach ($data as $taskDTO) {
      echo "<tr>";
    echo "<td>" . $taskDTO->getTitle() . "</td>";
    echo "<td>" . $taskDTO->getCategory() . "</td>";
    echo "<td>" . $taskDTO->getUserName() . "</td>";
    echo "<td><a href=\"/examprep/edit.php?id=" . $taskDTO->getTaskId() . "\">Edit task</a></td>";
    echo "<td><a href=\"/examprep/delete.php?id=" . $taskDTO->getTaskId() . "\">Delete task</a></td>";

    echo "</tr>";
}

echo "</table>";
