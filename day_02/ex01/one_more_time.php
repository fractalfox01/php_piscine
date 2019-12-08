#!/usr/bin/php
<?php
if ($argc > 1)
{
    if (strtotime($argv[1]))
    {
        echo strtotime($argv[1]);
    }
    else
    {
        echo "Wrong Format";
    }
}
?>