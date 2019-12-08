#!/usr/bin/php
<?php
if ($argc > 1)
{
    $start = 0;
    $flag = 0;
    $atag = 0;
    $x = 0;
    $file = fopen($argv[1], "r") or die("can't read that.");
    if ($file)
    {
        while (!feof($file))
        {
            $line = fgets($file);
            // echo $line;
            while ($x < strlen($line))
            {
                if ($flag == 0 and $line[$x] == '"')
                {
                    $flag = 1;
                }
                elseif ($flag == 1 and $line[$x] == '"')
                {
                    $flag = 0;
                }
                if ($atag == 0 and $line[$x] == '<' and $line[$x + 1] == 'a')
                {
                    $atag = 1;
                }
                elseif ($atag == 1 and $line[$x] == '<' and $line[$x + 1] == '/' and $line[$x + 2] == 'a')
                {
                    $atag = 0;
                }
                if ($line[$x] == '<')
                    $start = 0;
                if ($atag > 0 and $line[$x] == '>')
                {
                    $start = 1;
                }
                if (($flag > 0 and $line[$x] != '"') or $start)
                {
                    echo strtoupper($line[$x]);
                }
                else
                {
                    echo $line[$x];
                }
                $x += 1;
            }
            $x = 0;
        }
        fclose($file);
    }
}
?>