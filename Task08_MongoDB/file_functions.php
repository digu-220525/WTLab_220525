<?php
$file = "sample.pdf";
echo "<h2>File Read/Write</h2>";
//file write
$fo = fopen($file, "w");//
$a = fwrite($fo, "rey file write chestunna chusuko ");
echo "echo of fwrite() : ".$a;//length of content
fclose($fo);

//file read
$fr = fopen($file, "r");
$content = fread($fr, filesize($file));
fclose($fr);

echo "<br>fread(): ".$content;

echo "<br>file_get_contents() = ".file_get_contents($file);
file_put_contents($file, "\nappended using file_put_contents\n", FILE_APPEND);
//file();   
echo "<br>Using file() : <br>";
$lines = file($file);#each line is an element in that array 
print_r($lines);

echo "<h2>File Information:</h2>";

echo "Exists: ".(file_exists($file) ? "Yes" : "No")."<br>";
echo "Size: ".filesize($file)." bytes<br>";
echo "Type: ".filetype($file)."<br>";
echo "Last Access: ".date("Y-m-d H:i:s", fileatime($file))."<br>";
echo "Last Modified: ".date("Y-m-d H:i:s", filemtime($file))."<br>";
echo "Created Time: ".date("Y-m-d H:i:s", filectime($file))."<br>";
echo "Permissions: ".fileperms($file)."<br>";
echo "Owner: ".fileowner($file)."<br>";
echo "Group: ".filegroup($file)."<br>";
echo "Inode: ".fileinode($file)."<br>";

echo"<h2>FILE & FOLDER MANAGEMENT</h2>";
copy($file, "copy_sample.txt");
rename("copy_sample.txt", "renamed_sample.txt");

unlink("renamed_sample.txt");//delete file

mkdir("newFold");
echo "Is File? ".(is_file($file) ? "Yes" : "No")."<br>";
echo "Is Directory? ".(is_dir("newFold") ? "Yes" : "No")."<br>";
rmdir("newFold");
echo"after rmdir('newFold') : ";
echo "<br>Is Directory? ".(is_dir("newFold") ? "Yes" : "No")."<br>";
echo"<h2>Directory Handling (Parsing Directories)</h2>";


echo "print_r of scandir(".") : <br>";
print_r(scandir("."));

echo "<br>opendir : <br>";
$dir = opendir(".");
while(($file = readdir($dir)) !== false) {
    echo $file . "<br>";
}
closedir($dir);

echo "Current Working Directory : getcwd() :";
echo getcwd();

chdir("..");
echo "<br>Changed Directory: chdir('..') : " . getcwd();

echo "<h2>File locking : </h2>";
$fl = fopen("lockfile.txt", "w+");//w-->w+
if(flock($fl, LOCK_EX)) {
    fwrite($fl, "Locked Write");
    flock($fl, LOCK_UN);
}
echo fread($fl,filesize('lockfile.txt'));
fclose($fl);


?>