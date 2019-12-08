#!/usr/bin/php
<?php

function save_file($file)
{
    echo "saving " . $file . "\n";
    $tmpdir = explode("://", $file);
    
    $dom = new DOMDocument('1.0'); 

    // // Loading HTML content in $dom 
    @$dom->loadHTMLFile($file); 

    // Selecting all image i.e. img tag object
    if ($dom)
    {
        // Grabbing all img tags and iterating through each as $element
        $anchors = $dom -> getElementsByTagName("img");
        foreach ($anchors as $element)
        {
            $input = $element->getAttribute("src");
            if (strchr($input, "http"))
            {
                $arr = explode("://", $input);
                $arr1 = explode("/", $arr[1]);
                $x = count($arr1) - 1;
                echo $arr1[$x];
                // using system curl to download picture.
                system("curl -s " . $input . " >> " . $tmpdir[1] . "/" . $arr1[$x]);
            }
            else
            {
                $arr2 = explode("/", $input);
                $x = count($arr2) - 1;
                echo $arr2[$x];
                system("curl -s " . $file . "/" . $input . " >> " . $tmpdir[1] . "/" . $arr2[$x]);
                touch($tmpdir[1] . "/" . $arr2[$x]);
            }
            $x = 0;
            echo "\n";
        }
    }
    else
    {
        echo "Failed to access page.\n";
    }
}

if ($argc > 1)
{
    $file = $argv[1] . "";
    echo $file;
    echo "\n";

    // only works on front pages (you can't use on a google images search pages :()
    $tmpdir = explode("://", $argv[1]);
    echo $tmpdir[1];
    if (!is_dir($tmpdir[1]))
    {
        if (!mkdir($tmpdir[1], 0755))
        {
            echo "Error\n";
        }
        else
        {
            save_file($argv[1]);
        }
    }
}
?>