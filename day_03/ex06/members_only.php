<?php

if (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW']) and strcmp($_SERVER['PHP_AUTH_USER'], "zaz") == 0 and strcmp($_SERVER['PHP_AUTH_PW'], "Ilovemylittleponey") == 0)
{
    header('WWW-Authenticate: Basic realm="Member area"');
    header('HTTP/1.0 200');
    header('Content_Type: text/html');
    echo "<html><body>Hello Zaz<br />";
    echo "<img src=\"" . base64_encode(file_get_contents("img/42.png")) . "\">";
    echo "</body></html>";
} else
{
    header('WWW-Authenticate: Basic realm="Member area"');
    header('HTTP/1.0 401 Unauthorized');
    header('Content_Type: text/html');
    echo "<html><body>That area is accessible for members only</body></html>";
    exit ;
}
?>