<?php session_start();
header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   </head>
   <body>

   

<?php
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");

  if(isset($_SESSION['login'])){$login = $_SESSION['login'];
  include 'conf.php';
  $STH=$DBH->query("select * from users where login=\"$login\"");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $row = $STH->fetch();  
   $avatar=$row["avatar"];
   $log=$row['login'];
   $surname=$row['surname'];
   $email=$row['email'];
   $name=$row["name"];
 
   if(!empty($avatar)){
   echo '<img src="'.$avatar.'" alt="my photo"/>';}
   
   
   echo "<table border='5px'><tr><td>name</td>";
   echo "<td>".$name."</td></tr>";
   echo "<tr><td>surname</td><td>".$surname."</td></tr>";
   echo "<tr><td>login</td><td>".$log."</td></tr>";
   echo "<tr><td>email</td><td>".$email."</td></tr>";
   echo "<tr><td colspan='2'><a href='load.php'>".$Lang['edit']."</a></td></tr> ";
   echo "<tr><td colspan='2'><a href='index.php'>".$Lang['main']."</a></tr></table>";
   
   }
   else{
   include 'Enter.php';}
?></div>
</body>
</html>