<?php session_start(); 
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html>
   <head>
   </head>

<?php
   include ('conf.php');
   $id=$_GET['id'];

   $STH=$DBH->query("select * from materials where id=\"$id\"");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $row = $STH->fetch();
   
   if ($_SESSION['NowLang']=='ua'){
   $textArea=$row["textArea"];
   $title=$row["title"];
   
   echo ('<br/>
	<form action="" method="POST">
	<input type="text" name="Nazva" value='.$title.'><br/>
	<textarea name="txtArea" cols="40" rows="5">'.$textArea.' </textarea><br/>
	<input type="submit" value="Edit!">
	</form>');
	
	$title=isset($_POST['Nazva']) ? $_POST['Nazva'] : $title;
    $textArea=isset($_POST['txtArea']) ? $_POST['txtArea'] : $textArea;
	$title = stripslashes($title);
   $title = htmlspecialchars($title);
   $txtArea = stripslashes($txtAreag);
   $txtArea = htmlspecialchars($txtArea);
	$STH=$DBH->query("update materials set title=\"$title\" where id=\"$id\"");
   
    $STH=$DBH->query("update materials set textArea=\"$textArea\" where id=\"$id\""); }
    else {

$textareaeng=$row["textareaeng"];
   $titleeng=$row["titleeng"];
   
   echo ('<br/>
  <form action="" method="POST">
  <input type="text" name="Nazva" value='.$titleeng.'><br/>
  <textarea name="textareaeng" cols="40" rows="5">'.$textareaeng.' </textarea><br/>
  <input type="submit" value="Edit!">
  </form>');
  
  $titleeng=isset($_POST['Nazva']) ? $_POST['Nazva'] : $titleeng;
    $textareaeng=isset($_POST['textareaeng']) ? $_POST['textareaeng'] : $textareaeng;
  $titleeng = stripslashes($titleeng);
   $titleeng = htmlspecialchars($titleeng);
   $txtareaeng = stripslashes($txtareaeng);
   $txtareaeng = htmlspecialchars($txtareaeng);
  $STH=$DBH->query("update materials set titleeng=\"$titleeng\" where id=\"$id\"");
   
    $STH=$DBH->query("update materials set textareaeng=\"$textareaeng\" where id=\"$id\"");


    }
   
    echo "<a href='index.php'>index</a>"
?></div>