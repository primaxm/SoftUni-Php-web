<?php /** @var App\Data\UserDTO $data */

?>

<h1>Register new user</h1>

<?php
    if ($data->getError() !== null) {
        echo "<div style='color:red'>" . $data->getError() . "</div>";
    }
?>
<form method="POST">
    <div>
        Username: <input type="text" value="<?=$data->getData('username')?>" name="username" minlength="4">
    </div>
    <div>
        Password: <input type="password" name="password" minlength="4">
    </div>
    <div>
        Password: <input type="password" name="confirm_password" minlength="4">
    </div>
    <div>
        Full Name: <input type="text" value="<?=$data->getData('full_name')?>" name="full_name" minlength="5">
    </div>
    <div>
        Born on: <input type="text" value="<?=$data->getData('born_on')?>" name="born_on">
    </div>
    <div>
        <input type="submit" value="Register!" name="register">
    </div>

</form>