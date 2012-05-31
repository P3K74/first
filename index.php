<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
 ?>
   <html>
    <head>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <style type="text/css">
.menu {background:#666666; height:30px; text-align:center;}
</style>
    </head>

<?php
$LangArray = array("ua", "ro");

$DefaultLang = "ro";

if(@$_SESSION['NowLang']) {
  
  if(!in_array($_SESSION['NowLang'], $LangArray)) {
  
    $_SESSION['NowLang'] = $DefaultLang;
  }
}
 else {
  $_SESSION['NowLang'] = $DefaultLang;
 }
$language = addslashes($_GET['lang']);
if($language) {
  if(!in_array($language, $LangArray)) {
   
       $_SESSION['NowLang'] = $DefaultLang;
  }
   else {
   
    $_SESSION['NowLang'] = $language;
   }
}

$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");

    ?>
 
    <body>
    
    <table width="100%">
  
  <tr>
    <td class="menu">
  <a href="index.php?lang=ua"><img src="img/ua.png"></a> 
  <a href="index.php?lang=ro"><img src="img/eng.gif" width="20"></a>
  </td>
  </tr>
</table>
   </body>
    </html>

    <?php    
include ('enter.php');
include ('redactirovat.php');
include ('dat.php');
include ('allmat.php');

    ?>
    