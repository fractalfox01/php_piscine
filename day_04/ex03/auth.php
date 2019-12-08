<?php
function auth($login, $passwd)
{
    $priv = "../ex01/private";
    $passwdlist = $priv . "/passwd";

    if (!file_exists($priv))
    {
        echo "ERROR: (bad path) " . $priv . "\n";
        exit ;
    }
    if (file_exists($passwdlist))
    {
        $tmp = file_get_contents($passwdlist);
        $arr = explode("\n", $tmp);
        $x = 0;
        $un = 0;
        $pw = 0;
        $found = 0;
        while ($x < count($arr))
        {
            $y = 0;
            $output = explode(",", $arr[$x]);
            while ($y < count($output))
            {
                $pt = explode(":", $output[$y]);
                $et = substr($pt[1], 0, 64);
                if (strcmp($pt[3], $login) == 0)
                {
                    $un = 1;
                }
                if (strcmp($et, hash("sha256", $passwd)) == 0 and $un)
                {
                    $pw = 1;
                    $un = 0;
                    return true;
                }
                $y += 1;
            }
            $x += 1;
        }
        return false;
    }
}

if (auth($_POST['login'], $_POST['passwd']))
{
    echo "Access Granted\n";
}
else
{
    echo "Access Denied\n";
}
?>