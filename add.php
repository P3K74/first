<?php session_start(); 
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   </head>
   <body>

<?php
$login=$_SESSION['login'];
if(isset($login)){
	echo ('
	<form action="" method="post">');
echo $Lang["add"];
echo ('	<p><input type="text" name="titleukr"/><br/>
	<textarea name="txtAreaukr" cols="40" rows="5"></textarea><br/>
	<input type="text" name="titleeng"/><br/>
	<textarea name="txtAreaeng" cols="40" rows="5"></textarea><br/>
	<input type="submit" value="ADD!"/></p>
	</form> '  );
	
   $titleukr=isset($_POST['titleukr']) ? $_POST['titleukr'] : NULL;
   $txtAreaukr=isset($_POST['txtAreaukr']) ? $_POST['txtAreaukr'] : NULL;
   $titleukr = stripslashes($titleukr);
   $titleukr = htmlspecialchars($titleukr);
   $txtAreaukr = stripslashes($txtAreaukr);
   $txtAreaukr = htmlspecialchars($txtAreaukr);


   $titleeng=isset($_POST['titleeng']) ? $_POST['titleeng'] : NULL;
   $txtAreaeng=isset($_POST['txtAreaeng']) ? $_POST['txtAreaeng'] : NULL;
   $titleeng = stripslashes($titleeng);
   $titleeng = htmlspecialchars($titleeng);
   $txtAreaeng = stripslashes($txtAreaeng);
   $txtAreaeng = htmlspecialchars($txtAreaeng);
   
   if (empty($titleukr) or empty($txtAreaukr) or empty($titleeng) or empty ($txtAreaeng))
         {
   	     echo "<p>Please enter title and textarea for form:<br/></p>";
   	  }
   	else{
      include 'conf.php';
      $STH=$DBH->query("INSERT INTO materials (title,textArea,titleeng,textareaeng,added_user) values(\"$titleukr\",\"$txtAreaukr\",\"$titleeng\",\"$txtAreaeng\",\"$login\")");
    
      echo '<script>location.href="index.php";</script>';
   }
}
?>
</body>
</html>