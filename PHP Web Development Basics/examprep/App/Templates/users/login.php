<?php /** @var App\Data\UserDTO $data */?>
<h1>Login</h1>

<?php
echo $data->getError();
?>
<form method="POST">
    <div>
        Username: <input type="text" name="username">
    </div>
    <div>
        Password: <input type="password" name="password">
    </div>
    <div>
        <input type="submit" value="Login" name="login">
    </div>

</form>