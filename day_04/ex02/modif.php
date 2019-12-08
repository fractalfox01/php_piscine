<?php
    // these two variables would probably do well as a macro or something..
    
    $priv = "../ex01/private";
    $passwdlist = $priv . "/passwd";

    function replace_a_line($data) {
        if (stristr($data, 'certain word')) {
        return "replaement line!\n";
        }
        return $data;
    }

    if ((isset($_POST['submit']) or isset($_GET['submit'])) and isset($_POST['login']) and isset($_POST['oldpw']) and isset($_POST['newpw']))
    {
        if (strcmp($_POST['submit'], "OK") == 0 or strcmp($_GET['submit'], "OK") == 0)
        {
            if (!file_exists($priv))
            {
                echo "ERROR";
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
                        if (strcmp($pt[3], $_POST['login']) == 0)
                        {
                            $un = 1;
                        }
                        if (strcmp($et, hash("sha256", $_POST['oldpw'])) == 0 and $un)
                        {
                            $found = 1;
                            $pw = 1;
                            $un = 0;
                            $newstr = serialize("{login:" . $_POST['login'] . ",passwd:" . hash("sha256", $_POST['newpw']));
                        }
                        $y += 1;
                    }
                    if ($un == 0 and $pw == 0)
                    {
                        $i = strlen($arr[$x]);
                        if ($i > 64)
                        {
                            $newarr .= $arr[$x] . "\n";
                        }
                    }
                    else
                    {
                        $newarr .= $newstr . "\n";
                        $pw = 0;
                    }
                    $x += 1;
                }
                if ($found)
                {
                    file_put_contents($passwdlist, $newarr);
                    echo "OK\n";
                    exit ;
                }
            }
            else
            {
                echo "ERROR\n";
            }
        }
        else
        {
            echo "ERROR\n";
        }
    }
    else
    {
        echo "ERROR\n";
    }
?>
