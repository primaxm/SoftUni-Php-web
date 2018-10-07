<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if (isset($_GET["text"])) {
    $arr = preg_split( "/[^A-Za-z]/", $_GET["text"] );
    $upper = [];
    for ($i = 0; $i < count($arr); $i++) {

        if(!empty($arr[$i]) && ctype_upper($arr[$i])) {
            $upper[] = $arr[$i];
        }
    }
    $sortedLines = implode(", ", $upper);
}
?>
<form>
    <textarea rows="10" name="text"><?php echo $sortedLines
        ?></textarea><br>
    <input type="submit" value="Extract">
</form>
</body>
</html>
