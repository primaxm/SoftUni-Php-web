<?php /** @var App\Data\UserDTO $data */?>
<h1>Login</h1>

<?php
if (isset($_SESSION['success'])) {
    echo "<div style='color: green'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
if ($data->getError() !== null) {
    echo "<div style='color:red'>" . $data->getError() . "</div>";
}
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