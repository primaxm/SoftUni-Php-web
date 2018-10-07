<?php
echo "<form>
    <input type=\"text\" name=\"name\"><br />
    <input type=\"text\" name=\"age\"><br />
    <input type=\"radio\" name=\"gender\" value=\"male\"> Male<br>
    <input type=\"radio\" name=\"gender\" value=\"female\"> Female<br>
    <input type=\"submit\" name=\"submit\" value=\"Submit\"><br />";
if (isset($_GET["name"])) {
echo "My name is " . htmlspecialchars($_GET["name"]) . ". I am "
    . htmlspecialchars($_GET["age"]) . " years old. I am "
    . htmlspecialchars($_GET["gender"]);

}