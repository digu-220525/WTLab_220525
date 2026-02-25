<?php
echo "STRING FUNCTIONS : <br>";
$user = $_POST['username'];
$password = $_POST['password'];
$gender   = $_POST['gender'];
$course   = $_POST['course'];
echo "username: ".$user;
//basic string functions
echo "<br>strlen() : ".strlen($user);
echo "<br>strrev() : ".strrev($user);

//case conversion
echo "<br>strtoupper() : ".strtoupper($user);
echo "<br>strtolower() : ".strtolower($user);
echo "<br>ucfirst() : ".ucfirst($user);
echo "<br>ucwords() : ".ucwords($user);

//Search & Replace
echo "<br>strpos(string,target string): strpos($user,\"Bad\") : ".strpos($user,"Bad");
echo "<br>str_replace(targeted substring,replaced substring,actual string ): ".str_replace("baditya","behera",$user);

//Subtring & Trimming
echo "<br>substr(string,start_ind,length): ".substr($user,9,5);
echo "<br>trim(string): ".trim($user);
echo "<br>ltrim(string): ".ltrim($user);
echo "<br>rtrim(string): ".rtrim($user);

//String Comparison
echo "<br>strcmp(string,compared_str): ".strcmp($user,"digambar be");//difference of (asci value) of first miss match in both str
echo "<br>strcasecmp(string,compared_str): ".strcasecmp($user,"Digambar be");

//Special Characters & Security

echo "<br>htmlspecialchars(\"<h1>hello</h2>\") : ".htmlspecialchars("<h1>hello</h2>");//==>1)<h1>hello</h1>==>2)&lt;h1&gt;hello&lt;/h2&gt;
echo "<br>addslashes(string): ".addslashes($user);//it show the escape char like for "-->\",




?>