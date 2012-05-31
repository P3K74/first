<?php session_start(); 
$CurentLang = addslashes($_SESSION['NowLang']);
  include_once ("lang/lang.".$CurentLang.".php"); 
  ?>
<?php $id=$_GET['id']; header("Location: materials.php?id=".$id."");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   
   </head>
   <body>
 
 <?php
 include ('conf.php');
 
   if($_SESSION['NowLang']=='ua'){
   $STH=$DBH->query("select title from materials where id=\"$id\"");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   while($row = $STH->fetch()) {   
   echo "<h2>".$row["title"]."</h2>";}
     
   $STH=$DBH->query("select textArea from materials where id=\"$id\"");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   while($row = $STH->fetch()) {
   echo $row["textArea"];}
}
   else{
   $STH=$DBH->query("select titleeng from materials where id=\"$id\"");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   while($row = $STH->fetch()) {   
   echo "<h2>".$row["titleeng"]."</h2>";}
     
   $STH=$DBH->query("select textareaeng from materials where id=\"$id\"");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   while($row = $STH->fetch()) {
   echo $row["textareaeng"];} }
   
 echo '<p> <a href="delete.php?id='.$id.'"> Delete_material</a><p>';
 echo ' <a href="edit.php?id='.$id.'"> Edit_material</a>';
   

   
  
   ?>
   </body>
   </html>