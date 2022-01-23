<?php
function clean_scandir($dir)
{
    $files = scandir($dir);
    $files = array_diff($files, array('.', '..'));
    return $files;
}
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
