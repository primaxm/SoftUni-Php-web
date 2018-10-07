
<?php
if (isset($_GET["input"])) {
    $arr = preg_split( "/[^A-Za-z]/", $_GET["input"] );
    $upper = [];
    for ($i = 0; $i < count($arr); $i++) {
        if(!empty($arr[$i])) {
            if (array_key_exists(strtolower($arr[$i]), $upper)) {
                $upper[strtolower($arr[$i])]++;
            } else {
                $upper[strtolower($arr[$i])] = 1;
            }

        }
    }

    echo "<table border='2'>";
        foreach ($upper as $key => $val) {
            echo "<tr>";
            echo "<td>{$key}</td><td>{$val}</td>";
            echo "</tr>";
        }
    echo "</table>";


} else {
?>
    <form>
    <textarea rows="10" name="input"></textarea><br>
        <input type="submit" value="Extract">
    </form>
    <?php
}
?>

