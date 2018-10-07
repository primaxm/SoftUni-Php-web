<?php
if (isset($_GET['name'])) {

    echo "<table border='2'>";
    echo "<tr>";
    echo "<td style='background-color: orange;'>Name</td>";
    echo "<td>"; if(isset($_GET['name'])) {echo htmlspecialchars($_GET['name']);}; echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='background-color: orange;'>Phone number</td>";
    echo "<td>"; if(isset($_GET['phone'])) {echo htmlspecialchars($_GET['phone']);}; echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='background-color: orange;'>Age</td>";
    echo "<td>"; if(isset($_GET['age'])) {echo htmlspecialchars($_GET['age']);}; echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='background-color: orange;'>Address</td>";
    echo "<td>"; if(isset($_GET['address'])) {echo htmlspecialchars($_GET['address']);}; echo "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<form>
    Name: <input type=\"text\" name=\"name\"><br />
    Phone: <input type=\"text\" name=\"phone\"><br />
    Age: <input type=\"text\" name=\"age\"><br />
    Address: <input type=\"text\" name=\"address\"><br />
    <input type=\"submit\" name=\"submit\" value=\"Submit\">
</form>";
}