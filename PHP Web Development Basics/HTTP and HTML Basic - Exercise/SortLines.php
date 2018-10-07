<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
    if (isset($_GET["lines"])) {
        $arr = explode("\r\n", $_GET["lines"]);
        sort($arr, 2);
        $sortedLines = implode("\r\n", $arr);
    }
    ?>
<form>
  <textarea rows="10" name="lines"><?php echo $sortedLines
      ?></textarea> <br>
    <input type="submit" value="Sort">
</form>
</body>
</html>
<?php

