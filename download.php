<?php
$name = "instat.exe";
$size = filesize("$name");
header("Content-Type: application/exe");
header("Content-Disposition: attachment; filename=$name");
header("Content-Length: $size");
header("Cache-control: private");

//$filename="$name";
//$fp =fopen($filename, ‘r’);
//fpassthru($fp);

header("Location: $name");