<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form>
    <?php
     if(isset($_GET['person'])) {
        echo "Hello, " . htmlspecialchars($_GET['person']) . "!";
     }
?>

    Name: <input type="text" name="person" />
    <input type="submit" />
</form>
</body>
</html>