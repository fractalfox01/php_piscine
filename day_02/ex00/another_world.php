#!/usr/bin/php
<?php
if ($argc > 1){
    $tmp1 = trim(preg_replace('/\s+/', ' ', $argv[1]));
    $tmp1 = trim(preg_replace('/\n/', '', $tmp1));
    echo $tmp1;
}
?>