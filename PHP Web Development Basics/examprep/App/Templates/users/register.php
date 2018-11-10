<?php /** @var App\Data\UserDTO $data */

?>

<h1>Register new user</h1>

<?php
    echo $data->getError();
?>
<form method="POST">
    <div>
        Username: <input type="text" value="<?=$data->getData('username')?>" name="username">
    </div>
    <div>
        Password: <input type="password" name="password">
    </div>
    <div>
        Password: <input type="password" name="confirm_password">
    </div>
    <div>
        First Name: <input type="text" value="<?=$data->getData('firstName')?>" name="firstName">
    </div>
    <div>
        Last Name: <input type="text" value="<?=$data->getData('lastName')?>" name="lastName">
    </div>
    <div>
        <input type="submit" value="Register!" name="register">
    </div>

</form>