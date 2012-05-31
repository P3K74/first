<?php session_start(); 
header('Content-Type: text/html; charset=utf-8');
 $CurentLang = addslashes($_SESSION['NowLang']);
  include_once ("lang/lang.".$CurentLang.".php"); 
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
  
   </head>
   <body>

  
   <input type="button" value="<?php echo $Lang['main']; ?>" onclick='window.location="index.php"'/></p>
</body>
</html>