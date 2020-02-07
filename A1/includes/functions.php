<?php

// The function that read file and display it in the web page
function readText($filename)
{
    $file = fopen($filename, "r") or die("Unable to open file!");
    $content = fread($file, filesize($filename));
    // use str_replace to change lines for different paragraphs
    // this solution is inspired by CSDN blog https://blog.csdn.net/dreamstone_xiaoqw/article/details/78251859
    $content = str_replace("\n", "<br />", $content);
    echo $content;
    fclose($file);
}

?>