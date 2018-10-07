<?php
if (isset($_GET["categories"]) && !empty($_GET["categories"])) output($_GET["categories"], "Categories");
if (isset($_GET["tags"]) && !empty($_GET["tags"])) output($_GET["tags"], "Tags");
if (isset($_GET["months"]) && !empty($_GET["months"])) output($_GET["months"], "Months");

function output($string, $title) {
        echo "<h2>$title</h2>";
        $categories = explode(", ", $string);
        echo "<ul>";
        foreach ($categories as $val) {
            echo "<li>$val</li>";
        }
        echo "</ul>";
}
if(!isset($_GET["categories"])) {
    echo "<form>
    Categories: <input type=\"text\" name=\"categories\"><br />
    Tags: <input type=\"text\" name=\"tags\"><br />
    Months: <input type=\"text\" name=\"months\"><br />
    <input type=\"submit\" value=\"Generate\">
</form>";
}
?>

