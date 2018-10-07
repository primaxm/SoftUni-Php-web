<?php
if (isset($_GET["input"])) {
    $arr = preg_split( "/[\s]/", $_GET["input"] );
    $string = implode($arr);

    for ($i = 0; $i < strlen($string); $i++) {
        if(ord($string[$i]) % 2 === 0) {
            echo "<span style=\"color:red\">$string[$i] </span>";
        } else {
            echo "<span style=\"color:blue\">$string[$i] </span>";
        }
    }

} else {
    ?>
    <form>
        <textarea rows="10" name="input"></textarea><br>
        <input type="submit" value="Extract">
    </form>
    <?php
}
?>
