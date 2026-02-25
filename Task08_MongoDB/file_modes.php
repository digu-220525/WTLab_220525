<?php

$file = "mode.txt";

echo "<br> r - Read only : ";
$h = fopen($file, "r");
fclose($h);
echo"w - Write (erase old data)";
$h = fopen($file, "w");
fwrite($h, "Write Mode\n");
fclose($h);

echo "<br>a - Append : ";
$h = fopen($file, "a");
fwrite($h, "Append Mode\n");
fclose($h);

echo "<br>x - Create new file (fail if exists) :";
$h = fopen("newfile.txt", "x");
fwrite($h, "Created using x mode\n");
fclose($h);

echo "<br>r+ - Read & Write :";
$h = fopen($file, "r+");
fwrite($h, "r+ Mode\n");
fclose($h);

echo "<br>w+ - Read & Write (erase old data) :";
$h = fopen($file, "w+");
fwrite($h, "w+ Mode\n");
fclose($h);

echo "<br>a+ - Read & Append";
$h = fopen($file, "a+");
fwrite($h, "a+ Mode\n");
fclose($h);

echo "<br>x+ - Create new file for Read & Write : ";
$h = fopen("another_newfile.txt", "x+");
fwrite($h, "x+ Mode\n");
fclose($h);


?>