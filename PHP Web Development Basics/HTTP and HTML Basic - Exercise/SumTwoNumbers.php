<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form>
    <?php
        if (isset($_GET["num1"]) && isset($_GET["num2"])) {
            $sum = floatval($_GET["num1"]) + floatval($_GET["num2"]);
            echo "<div>" . htmlspecialchars($_GET["num1"]) . " + "
                . htmlspecialchars($_GET["num2"]) . " = "
                . $sum
                . "</div>";
        }
    ?>
    <div>First Number:</div>
    <input type="number" name="num1" />
    <div>Second Number:</div>
    <input type="number" name="num2" />
    <div><input type="submit" /></div>
</form>
</body>
</html>