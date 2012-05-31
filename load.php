<?php session_start(); 
header('Content-Type: text/html; charset=utf-8');
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   </head>
   <body>
    <input type="button" value="<?php echo $Lang['main']; ?>" onclick='window.location="index.php"'/></p>
<?php

if(isset($_SESSION['login'])){
echo ('<form action="load_ava.php" method="post" enctype="multipart/form-data">
<p><input type="text" name="surname"/>'.$Lang['surname'].'<br/>
<input type="text" name="name"/>'.$Lang['name'].'<br/>
<input type="file" name="avatar"/><br/>
<input type="submit" name="submit" value="'.$Lang['load'].'"/></p></form>');}
?>
</body>
</html>