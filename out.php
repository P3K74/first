<?
session_start(); 

$CurentLang = addslashes($_SESSION['NowLang']);
if ($CurentLang = "ro"){
echo "<a href='index.php'> main page </a> ";	
}
else {
echo "<a href='index.php'> головна </a> ";	
}
session_destroy ();

?>