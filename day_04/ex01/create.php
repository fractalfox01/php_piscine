<?php
    $priv = "private";
    $passwdlist = $priv . "/passwd";

    if ((isset($_POST['submit']) or isset($_GET['submit'])) and isset($_POST['login']) and isset($_POST['passwd']))
    {
        if (strcmp($_POST['submit'], "OK") == 0 or strcmp($_GET['submit'], "OK") == 0)
        {
            if (!file_exists($priv))
            {
                mkdir($priv, 0755);
            }
            else
            {
                
            }
            if (file_exists($passwdlist))
            {
                $tmp = file_get_contents($passwdlist);
                $arr = explode("\n", $tmp);
                $x = 0;
                $abc = 'a';
                while ($x < count($arr))
                {
                    $y = 0;
                    $output = explode(",", $arr[$x]);
                    while ($y < count($output))
                    {
                        $pt = explode(":", $output[$y]);
                        if (strcmp($pt[3], $_POST['login']) == 0)
                        {
                            echo "ERROR\n";
                            exit ;
                        }
                        $y += 1;
                    }
                    $x += 1;
                }
                $str = serialize("{login:" . $_POST['login'] . ",passwd:" . hash("sha256", $_POST['passwd']));
                file_put_contents($passwdlist, $str . "\n", FILE_APPEND);
            }
            else
            {
                $str = serialize("{login:" . $_POST['login'] . ",passwd:" . hash("sha256", $_POST['passwd']));
                file_put_contents($passwdlist, $str . "\n", FILE_APPEND);
            }
            echo "OK\n";
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