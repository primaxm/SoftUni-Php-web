<?php /** @var \App\Data\UserDTO $data */?>

<h1>Your profile</h1>

<form method="POST">
    <div>
        Username: <input type="text" value="<?=$data->getUsername()?>" name="username">
    </div>
    <div>
        Password: <input type="text" name="password">
    </div>
    <div>
        First Name: <input type="text" value="<?=$data->getFirstName()?>" name="firstName">
    </div>
    <div>
        Last Name: <input type="text" value="<?=$data->getLastName()?>" name="lastName">
    </div>
    <div>
        BirthDate: <input type="text" value="<?=$data->getBornOn()?>" name="bornOn">
    </div>
    <div>
        <input type="submit" value="edit" name="edit">
    </div>

</form>

<br />
<div>You can <a href="logout.php">Logout</a> or view <a href="all.php">All users</a></div>