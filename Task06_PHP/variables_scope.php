<?php
echo "VARIABLES & VARIABLE SCOPE :  <br>";
//Task -2  Datatypes
$s = "varanasi";
$num = 30;
$f = 5.23;
$b = true;
$arr = [1,2,3];
echo "string : $s"."<br>","integer : $num"."<br>","float : $f"."<br>","boolean : $b"."<br>";
echo "arr : ";
print_r($arr);
echo "<br>";
//Task - 3 Variable scope
//1.Local scope 
function f(){
    $in=3;
    echo $in;
}
f();
echo "<br>var in function printing outside of it : ".$in;//null,undefined

//2.Global scope
$out = 30;
function f_(){
    global $out;
    echo"<br>outer var using inside func using gloabl : ". $out;#Undefined variable '$out'.intelephense(P1008)
}
f_();

//3.Static Scope
function s(){
    static $in=2    ;
    echo "<br>static ",$in;
    $in++;
}
s();
s();


?>