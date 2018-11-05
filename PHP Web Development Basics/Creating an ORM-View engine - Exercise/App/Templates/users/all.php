<?php /** @var \App\Data\UserDTO[] $data */ ?>

<h1>All users</h1>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Full Name</td>
        <td>Birth Date</td>
    </tr>
    <?php
    /** @var \App\Data\UserDTO $d */

    foreach ($data as $d) {
        echo "<tr>";
        echo "<td>" . $d->getId() . "</td>";
        echo "<td>" . $d->getUsername() . "</td>";
        echo "<td>" . $d->getFirstName() . $d->getLastName() . "</td>";
        echo "<td>" . $d->getBornOn() . "</td>";
        echo "</tr>";
    }

    ?>

    <tr><td colspan="4">&nbsp;</td></tr>
    <tr><td colspan="4">Go back to your <a href="profile.php">profile</a> </td></tr>

</table>
