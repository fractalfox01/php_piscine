<?php
function set_flags($tkey, $val)
{
    if (strcmp($tkey, "action") == 0 and strcmp($val, "set") == 0)
    {
        return (1);
    }
    elseif (strcmp($tkey, "action") == 0 and strcmp($val, "get") == 0)
    {
        return (2);
    }
    elseif (strcmp($tkey, "action") == 0 and strcmp($val, "del") == 0)
    {
        return (3);
    }
    return (0);
}
// flag holds 1 for get, 2 for set, and 3 for del
$fname = 0;
$vp = "0";
foreach ($_GET as $key => $value)
{
    // echo "testing: $key with $value\n";
    $flag = set_flags($key, $value);
    if ($flag > 0)
    {
        if ($flag == 1)
        {
            $vp = $_GET['value'];
        }
        break ;
    }
}
if ($flag == 1)
{
    setcookie("value", $_GET['value'], time() + (86400 * 30), "/");
}
if ($flag == 2)
{
    if(!isset($_COOKIE['value']))
    {
        
    }
    else
    {
        echo htmlspecialchars($_COOKIE['value']);
    }
}
if ($flag == 3)
{
    setcookie("value", $_COOKIE['value'], time() - (3600), "/");
}
?>