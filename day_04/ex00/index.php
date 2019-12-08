<?php
session_start();

echo "<form action=\"/vog4/ex00/index.php\">";
echo "Username <input name=\"login\" value=\"" . $_COOKIE[''] . "\">";
echo "<br />";
echo "Password: <input type=\"passwd\" value=\"" . $_SESSION['passwd'] . "\">";
echo "<br />";
echo "<input type=\"submit\" value=\"OK\">";
echo "</form>";

?>